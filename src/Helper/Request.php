<?php
namespace Helper;
/**
 * Description of Request
 *
 * @author raulonea
 */
class Request
{
   private $post;
   private $get;
   
   public function __construct()
   {
       $this->post = $_POST;
       $this->get = $_GET;
   }
   
   public function get($name)
   {
       if (array_key_exists($name, $this->get)){
           return $this->get[$name];
       }
       return "";
   }
   
   public function post($name)
   {
       if (array_key_exists($name, $this->post)){
           return $this->post[$name];
       }
       return "";
   }
}
