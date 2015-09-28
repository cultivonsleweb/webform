<?php 
namespace cultivonsleweb\webform\security;

class Token
{
	/**
	  * Store key generate
	  *
	  * @var string 
	  */
	private $sFormKey;
	
	/**
	  * Store old key generate
	  *
	  * @var string 
	  */
	private $sOldFormKey;
	
	public function __construct ()
	{
		if ( isset($_SESSION['webform_form_key']) )
        {
            $this->sOldFormKey = $_SESSION['webform_form_key'];
        }
	}
	
	private function generateKey()
    {
        $sIp = $_SERVER['REMOTE_ADDR'];
        $sUniqid = uniqid(mt_rand(), true);
        return hash('sha512', $sIp . $sUniqid);
    }
	
	public function outputKey($bDisplay=false)
    {
        $this->sFormKey = $this->generateKey();
        $_SESSION['webform_form_key'] = $this->sFormKey;
        $sHtml = "<input type='hidden' name='webform_form_key' id='webform_form_key' value='".$this->sFormKey."' />";
        if ( $bDisplay )
        {
            echo $sHtml;
            return;
        }
        return $sHtml;
    }
	
	public function validate()
    {
        if($_POST['webform_form_key'] == $this->sOldFormKey)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}