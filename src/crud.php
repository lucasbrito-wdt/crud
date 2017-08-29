<?php
  /*
   * To change this license header, choose License Headers in Project Properties.
   * To change this template file, choose Tools | Templates
   * and open the template in the editor.
   */

  namespace NewInterface;

  /**
   * Description of Crud
   *
   * @author Luquinhas Brito
   */
  class Crud extends \MatthiasMullie\Minify {
    
    # @array, Os parâmetros do Map
    private $map;    
    
    # @array, Os parâmetros das Metas
    private $meta;
    
    # @array, Os parâmetros das Stylesheet    
    private $stylesheet;
    
    # @array, Os parâmetros das AngularJS
    private $angularJS;
    
    # @array, Os parâmetros das Javascript
    private $javascript;
    
    private $minifyCSS;
    
    private $minifyJS;


    public function __construct() {
      $this->map = SITE_MAP;
      $this->meta = array();
      $this->stylesheet = array();
      $this->javascript = array();
      $this->minifyCSS = new Minify\CSS();
      $this->minifyJS = new Minify\JS();
    }
    
    
    /**
     * 	@void 
     *
     * 	Add the parameter to the parameter array
     * 	@param string $meta  
    */    
    public function Meta($meta){
      
    }

    /**
     * 	@void 
     *
     * 	Add the parameter to the parameter array
     * 	@param string $stylesheet  
    */    
    public function Stylesheet($stylesheet){
      $header = $this->InterfaceDescription("Start : Stylesheet");
      foreach ($stylesheet["file"] as $style):        
        $display = $this->InterfaceDescription("Start : {$style}");
        $format = $this->map["Styleheet"].$style.".css";
        $display .= $this->InterfaceStylesheet($format);
        $display .= $this->InterfaceDescription("End : {$style}");
        print $display;
      endforeach;
      foreach ($stylesheet["url"] as $style):
        $display = $this->InterfaceDescription("Start : {$style}");
        $display .= $this->InterfaceStylesheet($style);
        $display .= $this->InterfaceDescription("End : {$style}");
        print $display;
      endforeach;
      $header .= $this->InterfaceDescription("End : Stylesheet");
      print $header;
    }
    
    /**
     * 	@void 
     *
     * 	Add the parameter to the parameter array
     * 	@param string $angularJS  
    */    
    public function AngularJS($angularJS){
      $_Folder = ["lib" => $this->map["AngularJS"]."Lib/", "default" => $this->map["AngularJS"]."Lib/Default/", "controllers" => $this->map["AngularJS"]."Controllers/", "directives" => $this->map["AngularJS"]."Directives/", "filters" => $this->map["AngularJS"]."Filters/", "services" => $this->map["AngularJS"]."Services/", "configs" => $this->map["AngularJS"]."Config/"];
      if(array_key_exists("lib", $angularJS)){
        foreach ($angularJS["lib"] as $param){        
          $_Display = $this->InterfaceDescription("Start : {$param}");
          $_Format = $_Folder["lib"].$param.".js";
          $_Display .= $this->InterfaceAngularJS($_Format);
          $_Display .= $this->InterfaceDescription("End : {$param}");
          print $_Display;
        }
      }
      if(array_key_exists("default", $angularJS)){
        foreach ($angularJS["default"] as $param){        
          $_Display = $this->InterfaceDescription("Start : {$param}");
          $_Format = $_Folder["default"].$param.".js";
          $_Display .= $this->InterfaceAngularJS($_Format);
          $_Display .= $this->InterfaceDescription("End : {$param}");
          print $_Display;
        }
      }      
      if(array_key_exists("app", $angularJS)){
        foreach ($angularJS["app"] as $param){        
          $_Display = $this->InterfaceDescription("Start : {$param}");
          $_Format = $_Folder["lib"].$param.".js";
          $_Display .= $this->InterfaceAngularJS($_Format);
          $_Display .= $this->InterfaceDescription("End : {$param}");
          print $_Display;
        }
      }
      if(array_key_exists("controllers", $angularJS)){
        foreach ($angularJS["controllers"] as $param){        
          $_Display = $this->InterfaceDescription("Start : {$param}");
          $_Format = $_Folder["controllers"].$param.".js";
          $_Display .= $this->InterfaceAngularJS($_Format);
          $_Display .= $this->InterfaceDescription("End : {$param}");
          print $_Display;
        }
      }
      if(array_key_exists("directives", $angularJS)){
        foreach ($angularJS["directives"] as $param){        
          $_Display = $this->InterfaceDescription("Start : {$param}");
          $_Format = $_Folder["directives"].$param.".js";
          $_Display .= $this->InterfaceAngularJS($_Format);
          $_Display .= $this->InterfaceDescription("End : {$param}");
          print $_Display;
        }
      }
      if(array_key_exists("filters", $angularJS)){
        foreach ($angularJS["filters"] as $param){        
          $_Display = $this->InterfaceDescription("Start : {$param}");
          $_Format = $_Folder["filters"].$param.".js";
          $_Display .= $this->InterfaceAngularJS($_Format);
          $_Display .= $this->InterfaceDescription("End : {$param}");
          print $_Display;
        }
      }
      if(array_key_exists("services", $angularJS)){
        foreach ($angularJS["services"] as $param){        
          $_Display = $this->InterfaceDescription("Start : {$param}");
          $_Format = $_Folder["services"].$param.".js";
          $_Display .= $this->InterfaceAngularJS($_Format);
          $_Display .= $this->InterfaceDescription("End : {$param}");
          print $_Display;
        }
      }
      if(array_key_exists("configs", $angularJS)){
        foreach ($angularJS["configs"] as $param){        
          $_Display = $this->InterfaceDescription("Start : {$param}");
          $_Format = $_Folder["configs"].$param.".js";
          $_Display .= $this->InterfaceAngularJS($_Format);
          $_Display .= $this->InterfaceDescription("End : {$param}");
          print $_Display;
        }
      }
      
    }
    
    /**
     * 	@void 
     *
     * 	Add the parameter to the parameter array
     * 	@param string $javascript  
    */    
    public function Javascript($javascript){
      if(array_key_exists("file", $javascript)){
        foreach ($javascript["file"] as $script):        
          $display = "<!-- Start : ".ucwords($script)." -->";
          $format = $this->map["Javascript"].$script.".js";
          $display .= $this->InterfaceJavascript($format);
          $display .= "<!-- End : ".ucwords($script)." -->";
          print $display;
        endforeach;
      }
      if(array_key_exists("url", $javascript)){
        foreach ($javascript["url"] as $script):
          $display = "<!-- Start : ".$script." -->";
          $display .= $this->InterfaceJavascript($script);
          $display .= "<!-- End : ".$script." -->";
          print $display;
        endforeach;
      }
    }
    
    /**
     * 	@void 
     *
     * 	Adicione uma Descrição
     * 	@param string $_Description  
    */    
    public function InterfaceDescription($_Description){
      $_Param = "<!-- {$_Description} -->";
      return $_Param;
    }

    /**
     * 	@void 
     *
     * 	Adicione um CSS para Desevolver a Interface
     * 	@param string $_href  
    */    
    public function InterfaceStylesheet($_href){
      $_Style = $this->minifyCSS->minify($_href);
     //$_Style = "<link href={$_href} rel=stylesheet type=text/css />";
     return $_Style;
    }

    /**
     * 	@void 
     *
     * 	Adicione um JS para Desevolver a Interface
     * 	@param string $_src  
    */    
    public function InterfaceAngularJS($_src){
     $_Script = "<script src={$_src} type=text/javascript></script>";
     return $_Script;
    }    
    
    /**
     * 	@void 
     *
     * 	Adicione um JS para Desevolver a Interface
     * 	@param string $_src  
    */    
    public function InterfaceJavascript($_src){
     $_Script = "<script src={$_src} type=text/javascript></script>";
     return $_Script;
    }
  }