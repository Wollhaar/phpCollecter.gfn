<?php

include_once 'config/conf.php';


switch ($_GET['a']) {

    case 'home':
        $tpl = 'home';
        //$benutzer = $userManager ->laden();
        break;

    case 'regist':
        $tpl = 'registration';
        if (isset($_SESSION['reg'])){
            $reg = $_SESSION['reg'];
            unset($_SESSION['reg']);
            $error = true;
        }
        break;
        
    case 'catalog':
        $tpl = 'catalog';
        $products = $productmanager->find();
        break;
    
    case 'galery':
        $tpl = 'galery';
        $filelist = scandir(UPLOAD_PATH);
        unset($filelist[0]);
        unset($filelist[1]);
        shuffle($filelist);
        break;
    
    case 'admin':
        $tpl = 'admin';
        $users = $userManager->showAll();
        if(isset($_GET['val'])){
            $helper = new Helper();
            $stat = $helper->status($_GET['val']);
            $userManager->changeStatus($stat, $_GET['id']);
            header('location: ?a=admin');
        }
        break;
        
    case 'manage':
        $tpl = 'manageUser';
        $user = $userManager->getUser($_GET['id']);
        //$user->getFirstname();
        if (isset($_POST['firstname'])){
            $userManager->userUpdate($_POST);
            header('location: ?a=admin');       
            
        }
        break;
    
    case 'new': 
        if(empty($_POST)){
        $tpl = 'new_product';
        $product = new Product();
        } else{
            $productmanager->save($_POST, $_FILES['upload']);
            header('location: ?a=catalog');
        }
        break;
        
    case 'edit':
        $tpl = 'new_product';
        $product = $productmanager->findById($_GET['id']);
        break;

    case 'save':
        $validator->validate($_POST);
        
        if (count($validator->getError()) > 0){
            $tpl = 'registration';
            $reg = $_POST;
            $error = $validator->getError();
            
        } else{
            $userManager->save($_POST);
            header('location: ?a=home');
        }
        
        break;
    
    case 'login':
        if($userManager->login($_POST)){
        header('location: ?a=home');
        }  else {
            $tpl = 'login_error';
            
        }
        break;
    
    case 'logout':
        $_SESSION = array();
        header('location: ?a=home');
        break;
    
    default:
        header('Location: ?a=home');
        break;
}

require_once 'tpl/basic.tpl';
