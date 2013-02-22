<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Page
 *
 * @author sani
 */
class PostController extends Controller {
    //put your code here
    public $layout='//layouts/column2left';
    
    public function actionIndex($id){
        $model = Posts::model()->findByPk($id);
		
        
        $this->render('view', array('model'=>$model));
    }
    
    public function actionId($id){
        $model = Posts::model()->findByPk($id);
        $comment = Pengaduan::model()->getComment($id);
	$count = Pengaduan::model()->getCommentCount($id);
        $this->render('view', array('model'=>$model, 'comment'=>$comment, 'count'=>$count));
    }
}

?>