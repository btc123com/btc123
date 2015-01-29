<?php
abstract class abstractController 
{
    protected $objS;
    protected $objC;
    protected $params;
    
    public function __construct()
    {
        global $objS;
        global $objC;
        global $params;
        
        $this->objS = $objS;
        $this->objC = $objC;
        $this->params = $params;

        $objS->assign('loginUser', isset($_SESSION['sUser']['userName']) ? '/' . $_SESSION['sUser']['userName'] : '');
    }
}