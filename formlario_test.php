<?php
class formulario
{
    protected $nombre_usuario;
    protected $proyecto;

    protected $fecha;
    protected $numero_formulario;

    function __construct($nombre_usuario, $proyecto, $fecha, $numero_formulario)
    {
        $this->nombre_usuario;
        $this->proyecto;
        $this->fecha;
        $this->numero_formulario;
    }
}
class formularioRendicionCuentas extends formulario
{

    protected $saldo_adepositar;
    protected $reintegro;


    protected $importeTotal;
    function __construct($importeConCheque = 0, $importeEfectivo = 0, $importeTotal, $destinoDeFondosDescripcion, $nombre_usuario, $proyecto, $fecha, $numero_formulario, $total = 0, $area = "S/N", $unidad = "S/N",)
    {

        formulario::__construct($nombre_usuario, $proyecto, $fecha, $numero_formulario);
        $this->importeConCheque = $importeConCheque;
        $this->importeEfectivo = $importeEfectivo;
    }
    protected function saldoDepositar($total, $importe)
    {

        if ($total > $importe) {

            return $this->saldo_adepositar = 0;
        } else {

            $this->saldo_adepositar = $this->importe - $this->$total;
        }
    }
    // es el lo que hay que devolver
    protected function reintegro($total, $importe)
    {
        if ($total > $importe) {
            $reintegro = $total - $importe;
            return $reintegro;
        } else {
            return 0;
        }
    }
    protected function cacularTotal($sumatoria_bolivianos)
    {
        $total = 0;
        // Nº - FECHA - Nº DE FACT/RECIBO - DESCRIPCIÓN - TOTAL BOLIVIANOS
        try {
            foreach ($sumatoria_bolivianos as $bolivianos) {
                if ($bolivianos > 0) {
                    $nBolivianos = abs($bolivianos);
                    if (is_int($nBolivianos) or is_float($nBolivianos)) {
                        $total += $sumatoria_bolivianos[$nBolivianos];
                    }
                }
            }
            return $total;
        } catch (Exception $e) {
            print_r($e);
        }
    }
    

}
class saveFormToDb{

function __construct($ci,$fecha,$importe,$destinoDeFondosDescripcion)
{
    
}
}
