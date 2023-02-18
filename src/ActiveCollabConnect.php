<?php

require_once __DIR__ . '/../vendor/autoload.php';

class ActiveCollabConnect {
    private $token;
    private $authenticator;

    function __construct(){
        $this->authenticator = new \ActiveCollab\SDK\Authenticator\Cloud(Config::$org_name, Config::$app_name, Config::$username, Config::$password);
        $this->setToken();
    }

    private function setToken(){
        $accounts = $this->authenticator->getAccounts();
        $token = $this->authenticator->issueToken(array_key_first($accounts));

        if ($token instanceof \ActiveCollab\SDK\TokenInterface) {
            $token->getUrl();
            $token->getToken();
        } else {
            print "Invalid response";
            die();
        }

        $this->token = $token;
    }

    public function getClient(){
        return new \ActiveCollab\SDK\Client($this->token);
    }

}