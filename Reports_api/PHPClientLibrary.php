<?php
class  Books
{
    /* Member variables */
    var $emailId;
    var $db;
    var $view;
    var $authtoken;

    function __construct($emailId,$authtoken,$db,$view)
    {
      echo "This is constructor <br>";

      $this->emailId=$emailId;//
      $this->authtoken=$authtoken;//
      
    }
    /* Member functions */
    
    
    function getView($db,$view)
    {
      $this->db=$db;//
      $this->view=$view;//
      $object=file("https://reportsapi.zoho.com/api/$this->emailId/$this->db/$this->view?ZOHO_ACTION=EXPORT&ZOHO_OUTPUT_FORMAT=CSV&ZOHO_ERROR_FORMAT=XML&authtoken=$this->authtoken&ZOHO_API_VERSION=1.0");   
       return $object;
    }

    function getDatabaseList()
    {
      $databseCatalog=file("https://reportsapi.zoho.com/api/$this->emailId?ZOHO_ACTION=DATABASEMETADATA&ZOHO_METADATA=ZOHO_CATALOG_LIST&ZOHO_OUTPUT_FORMAT=JSON&ZOHO_ERROR_FORMAT=XML&authtoken=$this->authtoken&ZOHO_API_VERSION=1.0");

        print_r($databseCatalog);
        return $databseCatalog;

    }
}



   $emailId="tanmay.sinha@zohocorp.com";
   $authtoken="da40907ae1c1ebac129f7d2e9da70dbb";
   $db="My Expenditure";
   $view="March_expenditure";
   $maths = new Books($emailId,$authtoken,$db,$view);
   $object=$maths->getView($db,$view);
   $maths->getDatabaseList();
   
?>