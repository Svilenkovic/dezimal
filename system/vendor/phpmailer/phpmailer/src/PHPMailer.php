<?php
namespace PHPMailer\PHPMailer;

class PHPMailer
{
    public $Host = '';
    public $Port = 25;
    public $SMTPAuth = false;
    public $Username = '';
    public $Password = '';
    public $SMTPSecure = '';
    public $SMTPDebug = 0;
    public $From = '';
    public $FromName = '';
    public $Subject = '';
    public $Body = '';
    public $isHTML = false;
    public $to = [];
    public $replyTo = [];
    
    const ENCRYPTION_STARTTLS = 'tls';
    const ENCRYPTION_SMTPS = 'ssl';
    
    public function isSMTP()
    {
        return true;
    }
    
    public function setFrom($address, $name = '')
    {
        $this->From = $address;
        $this->FromName = $name;
    }
    
    public function addAddress($address, $name = '')
    {
        $this->to[] = ['address' => $address, 'name' => $name];
    }
    
    public function addReplyTo($address, $name = '')
    {
        $this->replyTo[] = ['address' => $address, 'name' => $name];
    }
    
    public function isHTML($ishtml = true)
    {
        $this->isHTML = $ishtml;
    }
    
    public function send()
    {
        try {
            $headers = [];
            $headers[] = 'From: ' . $this->FromName . ' <' . $this->From . '>';
            
            if (!empty($this->replyTo)) {
                $headers[] = 'Reply-To: ' . $this->replyTo[0]['name'] . ' <' . $this->replyTo[0]['address'] . '>';
            }
            
            $headers[] = 'Content-Type: ' . ($this->isHTML ? 'text/html' : 'text/plain') . '; charset=UTF-8';
            $headers[] = 'X-Mailer: PHPMailer/' . phpversion();
            
            $to = '';
            foreach ($this->to as $recipient) {
                $to .= $recipient['name'] . ' <' . $recipient['address'] . '>, ';
            }
            $to = rtrim($to, ', ');
            
            $result = mail($to, $this->Subject, $this->Body, implode("\r\n", $headers));
            
            if (!$result) {
                throw new Exception('Failed to send email via mail() function');
            }
            
            return true;
        } catch (Exception $e) {
            error_log("PHPMailer send error: " . $e->getMessage());
            return false;
        }
    }
}
