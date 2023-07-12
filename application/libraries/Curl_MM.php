<?php

/**
 * @author @aficanstig
 * @copyright 2018
 */

Class Curl_MM
{
    public $xml;
    public $url;
    
    public function __construct($xml_string)
	{
		
        $this->url = "https://pay1.yo.co.ug/ybs/task.php";
        $this->xml = $xml_string;
       
	}
    
    public function testConnection()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url);
        
        // Set so curl_exec returns the result instead of outputting it.
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_VERBOSE, true);

        $verbose = fopen('php://temp', 'w+');
        curl_setopt($ch, CURLOPT_STDERR, $verbose);    
        // Get the response and close the channel.
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        
        if ($response === FALSE) {
            printf("cUrl error (#%d): %s<br>\n", curl_errno($ch),
                   htmlspecialchars(curl_error($ch)));
        }

        rewind($verbose);
        $verboseLog = stream_get_contents($verbose);
        
        echo "Verbose information:\n<pre>", htmlspecialchars($verboseLog), "</pre>\n";

        curl_close($ch);

    }
    
    public function send()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url);
        $headers = array();
        $headers[] = 'Accept: application/xml';
        $headers[] = 'Content-Type: application/xml';
        
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        //curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $this->xml);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $data = curl_exec($ch);
       
        
        return json_decode(json_encode(simplexml_load_string($data)), true);

        
    }
    


}