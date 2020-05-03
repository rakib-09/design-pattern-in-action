<?php
/**
 * Created by Anonymous
 * Date: 2/5/20
 * Time: 12:38 am
 */
//this pattern usually use for API  call.
interface Share {
    public function shareData();
}

//now if we change whatsApp share method. it will not impact on our client side.
// all the uses of adapter will remain same.
//here is the example:

class WhatsAppShare {
//    public function waShare(String $string)
//    {
//        echo "showing via whatsApp: {$string} \n";
//    }
    public function whatsAppShare(String $string)
    {
        echo "new way to show whatsApp message". $string;
    }
}

class WhatsAppShareAdapter implements Share {
    private $whatsApp;
    private $data;
    public function __construct(WhatsAppShare $whatsApp, String $message)
    {
        $this->whatsApp= $whatsApp;
        $this->data = $message;
    }

    public function shareData()
    {
     //  $this->whatsApp->waShare($this->data);
        //there is nothing we need to change without Adapter.
        // just change in the adapter can keep all others remain same.
        $this->whatsApp->whatsAppShare($this->data);
    }
}

function clientCode (Share $share){
    $share->shareData();
}

$adapter = new WhatsAppShareAdapter(new WhatsAppShare(), 'Hello from WhatsApp');
clientCode($adapter);

