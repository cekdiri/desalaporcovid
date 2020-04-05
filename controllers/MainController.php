<?php 

namespace app\controllers;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\filters\AccessRule;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;
/**
 * 
 */
class MainController extends Controller
{

    public function init()
    {   
        if(!\yii::$app->user->isGuest)
        {
            $userStatus = \yii::$app->user->identity->status; 
            switch ($userStatus) {
                case \app\models\User::STATUS_DELETED:
                case \app\models\User::STATUS_SUSPENDED:
                    throw new NotFoundHttpException('Akun Anda Telah Ditangguhkan, mohon hubungi admin desa terkait');
                    # code...
                    break;
                
                default:
                    # code...
                    break;
            }
        }
    }

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        // 'actions' => ['logout', 'index','update','transaction','usage'],
                        'allow' => $this->canAccessWithLogin(),
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function CanAccessWithLogin() {
        $requestedRoute = (!empty($requestedRoute)) ? rtrim($requestedRoute, '/') : rtrim(\yii::$app->requestedRoute, '/');
        if ($requestedRoute !== "site/login") {
            if(!\yii::$app->user->identity)
            {
                return TRUE;
            }
            $pathInfo = \yii::$app->request->pathInfo;
            switch ($pathInfo) {
                case 'dataposko':
                case 'dataposko/create':
                case 'dataposko/view':
                case 'dataposko/update':
                case 'dataposko/delete':
                    switch (\yii::$app->user->identity->userType) {
                    case \app\models\User::LEVEL_ADMIN:
                    case \app\models\User::LEVEL_ADMIN_DESA:
                    case \app\models\User::LEVEL_POSKO:
                            return true;
                            # code...
                            break;
                        
                        default:
                            return false;
                            # code...
                            break;
                    }
                    # code...
                    break;
                case 'posko':
                case 'posko/create':
                case 'posko/view':
                case 'posko/update':
                case 'posko/delete':
                    switch (\yii::$app->user->identity->userType) {
                    case \app\models\User::LEVEL_ADMIN:
                    case \app\models\User::LEVEL_ADMIN_DESA:
                            return true;
                            # code...
                            break;
                        
                        default:
                            return false;
                            # code...
                            break;
                    }
                    # code...
                    break;                
                case 'jenislaporan':
                case 'jenislaporan/create':
                case 'jenislaporan/view':
                case 'jenislaporan/update':
                case 'jenislaporan/delete':
                    switch (\yii::$app->user->identity->userType) {
                    case \app\models\User::LEVEL_ADMIN:
                            return true;
                            # code...
                            break;
                        
                        default:
                            return false;
                            # code...
                            break;
                    }
                    # code...
                    break;
                case 'users':
                case 'users/password':
                case 'users/create':
                case 'users/view':
                case 'users/update':
                case 'users/delete':
                    switch (\yii::$app->user->identity->userType) {
                    case \app\models\User::LEVEL_ADMIN:
                    case \app\models\User::LEVEL_ADMIN_DESA:
                            return true;
                            # code...
                            break;
                        
                        default:
                            return false;
                            # code...
                            break;
                    }
                    # code...
                    break;
                
                default:
                    return TRUE;
                    # code...
                    break;
            }
        }
    }
}

?>