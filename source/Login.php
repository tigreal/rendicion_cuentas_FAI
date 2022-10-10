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
        $this->flag = 0;
        $this->connect = new PDO("sqlsrv:server=".DB_SERVER_NAME."; Database=".DB_NAME."", DB_USER, DB_PASSWORD);
        $this->error = array();
        try {
            $conn = new PDO("sqlsrv:server=".DB_SERVER_NAME."; Database=".DB_NAME."", DB_USER, DB_PASSWORD);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            die( print_r( $e->getMessage() ) );   
        }
        
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

        // if (preg_match("/^.+[@]{1}.+$/", $login)) {
        //     if (filter_var($login, FILTER_VALIDATE_EMAIL) == false) {
        //         $this->onError("login", " *Enter correct Email address");
        //     }
        // }

        if ($this->flag == 0) {
            $password = md5($password);
            $query = "
            	SELECT * FROM login WHERE email = '$login' or username = '$login'
            ";
            if ($result = $this->connect->query($query)) {
                if ($result->num_rows > 0) {

                    $row = $result->fetch_assoc();
                    $loginID = $row['login_id'];
                    $query = "
                    	SELECT id FROM register WHERE
                    	id = '$loginID' and
                    	password = '$password'
                    ";
                    if ($result = $this->connect->query($query)) {
                        if ($result->num_rows > 0) {
                            Session::put('start', $loginID);
                            return json_encode(
                                [
                                "location" => URL . "/account.php"
                                ]
                            );
                        }
                        $this->onError("passLogin", " *Invalid password");
                        return json_encode($this->error);
                    }
                    return json_encode(
                        [
                        "Error" => "No estas registrado, " . $this->connect->error
                        ]
                    );
                }
                $this->onError("login", " *Invalid username or email");
                return json_encode($this->error);
            }
            return json_encode(
                [
                "Error" => "You are not registered, " . $this->connect->error
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
            "login" => " *Enter the login field",
            "passLogin" => " *Enter the password"
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
