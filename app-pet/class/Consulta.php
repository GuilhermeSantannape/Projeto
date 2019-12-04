<?php
    class Consulta {
        public $id_consulta;
        public $dta_consult;
        public $id_pessoa;
        public $status;
        public $hr_consulta;
        public $id_animal;

        function __construct($id_consulta, $dta_consult, $id_pessoa, $status, $hr_consulta, $id_animal){
            $this->id_consulta = $id_consulta;
            $this->dta_consult = $dta_consult;
            $this->id_pessoa = $id_pessoa;            
            $this->status = $status;
            $this->hr_consulta = $hr_consulta;
            $this->id_animal = $id_animal;
        }
    }
?>