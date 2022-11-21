<?php

// namespace AnkitJain\RegistrationModule;
// use AnkitJain\RegistrationModule\Session;
require_once dirname(__DIR__) . '/config/database.php';

class Login
{
    /*
    |--------------------------------------------------------------------------
    | Login Class
    |--------------------------------------------------------------------------
    |
    | For Login.
    |
    */

    protected $flag;
    protected $error;
    protected $connect;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $info_conexion = array("Database" => DB_NAME, "UID" => DB_USER, "PWD" => DB_PASSWORD);
        $this->flag = 0;
        $this->connect = sqlsrv_connect(
            DB_SERVER_NAME,
            $info_conexion
        );
        if (!$this->connect) {
            die(print_r(sqlsrv_errors(), true));
        }
        $this->error = array();
    }

    /**
     * Credentials check for allowing user to login
     *
     * @param array $data Contains the User Credentials
     *
     * @return json
     */
    public function authLogin($data)
    {
        $data = $this->emptyValue($data);

        $login = $data["login"];
        $password = $data["passLogin"];

        if (preg_match("/^[0-9]+$/", $login)) {
            if (filter_var($login, FILTER_VALIDATE_INT) == false) {
                $this->onError("login", " *Introdusca su carnet correctamente");
            }
        }

        if ($this->flag == 0) {
            $password = $password;
            $query = "select top 1 * from login where carnet=" . $login . "";
            $params = array();
            // SQLSRV_CURSOR_KEYSET https://learn.microsoft.com/en-us/sql/connect/php/cursor-types-sqlsrv-driver?view=sql-server-ver16
            $options =  array("Scrollable" => SQLSRV_CURSOR_KEYSET);
            // only return false if a parameters are bad
            $declaracion = sqlsrv_prepare($this->connect, $query,$params,$options);
            // only return false if the query is bad formating or eny problem whit the query
            $res = sqlsrv_execute($declaracion);

            if ($declaracion && $res) {

                $num_rows = sqlsrv_num_rows($declaracion);
                // echo "numero de rows:";
                // var_dump($num_rows);
                $row = sqlsrv_fetch_array($declaracion, SQLSRV_FETCH_ASSOC);
                // var_dump($row);

                if ($num_rows > 0) {
                    // sqlsrv_close($this->connect);

                    $loginID = $row['carnet'];
                    $query= "
                    	SELECT name FROM login WHERE
                    	carnet = '$loginID' and
                    	clave = '$password'
                    ";
                    $declaracion = sqlsrv_prepare($this->connect, $query,$params,$options);
                    $res = sqlsrv_execute($declaracion);
                    $num_rows = sqlsrv_num_rows($declaracion);
                    // echo("nemro de rows:");
                    // var_dump($num_rows);
                    // var_dump($declaracion);
                    if ($num_rows>0) {
                        sqlsrv_execute($declaracion);
                        $row = sqlsrv_fetch_array($declaracion, SQLSRV_FETCH_ASSOC);
                      
                        // echo "row:";
                        // var_dump($row);
                        if ($num_rows > 0) {
                            // Session::put('start', $loginID);
                            return json_encode(
                                [
                                    "location" => URL . "/formulario.php"
                                ]
                            );
                        }
                        $this->onError("passLogin", " *Invalid password");
                        return json_encode($this->error);
                    }
                    return json_encode(
                        [
                            "Error" => "No estas registrado, "
                            // "Error" => "No estas registrado, " . $this->connect->error
                        ]
                    );

                    $this->onError("login", " *Usuario Invalido");
                    return json_encode($this->error);
                } else {
                    return json_encode(
                        [
                            "Error" => "No estas registrado, "
                            // "Error" => "No estas registrado, " . $this->connect->error
                        ]
                    );
                    // die(print_r(sqlsrv_errors(), true));
                }
            }
            return json_encode(
                [
                    "Error" => "No estas registrado, " 
                    // "Error" => "No estas registrado, " . $this->connect->error
                ]
            );
        } else {
            return json_encode($this->error);
        }
    }

    /**
     * For generating Error array by key value pair
     *
     * @param string $key   Contains key
     * @param string $value Contains the Value for the key
     *
     * @return void
     */
    public function onError($key, $value)
    {
        $this->flag = 1;
        $this->error = array_merge(
            $this->error,
            [
                [
                    "key" => $key,
                    "value" => $value
                ]
            ]
        );
    }

    /**
     * For checking whether the credentials are empty or not
     *
     * @param array $data Contains the Credentials
     *
     * @return array
     */
    public function emptyValue($data)
    {
        $errorCode = array(
            "login" => " *Introdusca el Carnet de Identidad",
            "passLogin" => " *Introdusca la clave"
        );

        foreach ($data as $key => $value) {
            $data[$key] = trim($data[$key]);
            $value = trim($value);
            if (empty($value)) {
                $this->onError($key, $errorCode[$key]);
            }
        }
        return $data;
    }
}
