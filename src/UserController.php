<?php 

require_once 'src/ActiveCollabConnect.php';
require_once 'IndexController.php';

class User extends IndexController{
    public $user_id;
    public $user_name;

    protected $user_email;
    protected $user_projects;

    private $ac_client;

    function __construct($user_email){
        $this->user_email = $user_email;

        $ac_connect = new ActiveCollabConnect;
        $this->ac_client = $ac_connect->getClient();

        $this->setUserDatas();
        if(!$this->user_id){
            return;
        }

        $this->user_projects = $this->getUserProjects();
    }

    private function setUserDatas(){
        $users = $this->ac_client->get('users')->getJson();

        $key = $this->searchInMultidimensionalArray($users, $this->user_email, 'email');
        if($key !== false){
            $this->user_id = $users[$key]["id"];
            $this->user_name = $users[$key]["display_name"];
        }
    }

    private function getUserProjects(){
        return $this->ac_client->get('users/'.$this->user_id.'/projects')->getJson();
    }

    public function getUserTasksInProjectByName($project_name){
        //Megkeressük a configban beállított projectet.
        $key = $this->searchInMultidimensionalArray($this->user_projects, $project_name, "name");
        if($key !== false){
            $tasks = $this->ac_client->get("projects/".$this->user_projects[$key]["id"]."/tasks")->getJson();

            foreach ($tasks["tasks"] as $key => $task) {
                if($task["assignee_id"] != $this->user_id){
                    unset($tasks["tasks"][$key]);
                }
            }

            array_multisort(array_column($tasks["tasks"], 'updated_on'), SORT_ASC, $tasks["tasks"]);

            return array_slice($tasks["tasks"], 0, 20);
        }
    }
}