<?php defined('SYSPATH') or die('No direct script access.'); ?>

2011-09-18 01:16:17 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 01:16:17 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 02:55:11 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 02:55:11 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 02:55:18 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 02:55:18 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 13:41:26 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 13:41:26 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 13:53:43 --- ERROR: ErrorException [ 4 ]: syntax error, unexpected ';' ~ APPPATH\classes\controller\index.php [ 7 ]
2011-09-18 13:53:43 --- STRACE: ErrorException [ 4 ]: syntax error, unexpected ';' ~ APPPATH\classes\controller\index.php [ 7 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler('controller_inde...')
#1 {main}
2011-09-18 13:53:43 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 13:53:43 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 13:53:53 --- ERROR: ErrorException [ 8 ]: Undefined variable: title ~ APPPATH\views\common\header.php [ 8 ]
2011-09-18 13:53:53 --- STRACE: ErrorException [ 8 ]: Undefined variable: title ~ APPPATH\views\common\header.php [ 8 ]
--
#0 D:\workspace\hustoj\application\views\common\header.php(8): Kohana_Core::error_handler('D:\workspace\hu...', Array)
#1 D:\workspace\hustoj\system\classes\kohana\view.php(61): include('D:\workspace\hu...')
#2 D:\workspace\hustoj\system\classes\kohana\view.php(343): Kohana_View::capture()
#3 D:\workspace\hustoj\system\classes\kohana\view.php(228): Kohana_View->render()
#4 D:\workspace\hustoj\application\views\index.php(1): Kohana_View->__toString('D:\workspace\hu...', Array)
#5 D:\workspace\hustoj\system\classes\kohana\view.php(61): include('D:\workspace\hu...')
#6 D:\workspace\hustoj\system\classes\kohana\view.php(343): Kohana_View::capture()
#7 D:\workspace\hustoj\system\classes\kohana\view.php(228): Kohana_View->render()
#8 D:\workspace\hustoj\system\classes\kohana\response.php(160): Kohana_View->__toString(Object(View))
#9 D:\workspace\hustoj\application\classes\controller\index.php(7): Kohana_Response->body()
#10 [internal function]: Controller_Index->action_index(Object(Controller_Index))
#11 D:\workspace\hustoj\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Request))
#12 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#13 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute()
#14 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#15 {main}
2011-09-18 13:53:53 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 13:53:53 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 13:54:26 --- ERROR: ErrorException [ 1 ]: Cannot pass parameter 2 by reference ~ APPPATH\classes\controller\index.php [ 8 ]
2011-09-18 13:54:26 --- STRACE: ErrorException [ 1 ]: Cannot pass parameter 2 by reference ~ APPPATH\classes\controller\index.php [ 8 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2011-09-18 13:54:26 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 13:54:26 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 13:54:57 --- ERROR: ErrorException [ 1 ]: Cannot pass parameter 2 by reference ~ APPPATH\classes\controller\index.php [ 8 ]
2011-09-18 13:54:57 --- STRACE: ErrorException [ 1 ]: Cannot pass parameter 2 by reference ~ APPPATH\classes\controller\index.php [ 8 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2011-09-18 13:54:57 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 13:54:57 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 13:55:15 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 13:55:15 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 13:55:19 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 13:55:19 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 13:55:48 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 13:55:48 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 13:55:59 --- ERROR: ErrorException [ 8 ]: Undefined variable: title ~ APPPATH\views\common\header.php [ 8 ]
2011-09-18 13:55:59 --- STRACE: ErrorException [ 8 ]: Undefined variable: title ~ APPPATH\views\common\header.php [ 8 ]
--
#0 D:\workspace\hustoj\application\views\common\header.php(8): Kohana_Core::error_handler('D:\workspace\hu...', Array)
#1 D:\workspace\hustoj\system\classes\kohana\view.php(61): include('D:\workspace\hu...')
#2 D:\workspace\hustoj\system\classes\kohana\view.php(343): Kohana_View::capture()
#3 D:\workspace\hustoj\system\classes\kohana\view.php(228): Kohana_View->render()
#4 D:\workspace\hustoj\application\views\index.php(1): Kohana_View->__toString('D:\workspace\hu...', Array)
#5 D:\workspace\hustoj\system\classes\kohana\view.php(61): include('D:\workspace\hu...')
#6 D:\workspace\hustoj\system\classes\kohana\view.php(343): Kohana_View::capture()
#7 D:\workspace\hustoj\system\classes\kohana\view.php(228): Kohana_View->render()
#8 D:\workspace\hustoj\system\classes\kohana\response.php(160): Kohana_View->__toString(Object(View))
#9 D:\workspace\hustoj\application\classes\controller\index.php(9): Kohana_Response->body()
#10 [internal function]: Controller_Index->action_index(Object(Controller_Index))
#11 D:\workspace\hustoj\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Request))
#12 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#13 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute()
#14 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#15 {main}
2011-09-18 13:55:59 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 13:55:59 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 13:56:27 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: style/style.css ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 13:56:27 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: style/style.css ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 13:56:27 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: js/hoj.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 13:56:27 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: js/hoj.js ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 13:56:27 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 13:56:27 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 14:22:08 --- ERROR: ErrorException [ 2048 ]: Creating default object from empty value ~ APPPATH\classes\controller\index.php [ 7 ]
2011-09-18 14:22:08 --- STRACE: ErrorException [ 2048 ]: Creating default object from empty value ~ APPPATH\classes\controller\index.php [ 7 ]
--
#0 D:\workspace\hustoj\application\classes\controller\index.php(7): Kohana_Core::error_handler()
#1 [internal function]: Controller_Index->action_index(Object(Controller_Index))
#2 D:\workspace\hustoj\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Request))
#3 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute()
#5 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#6 {main}
2011-09-18 14:22:08 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 14:22:08 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 14:22:24 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: style/style.css ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 14:22:24 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: style/style.css ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 14:22:24 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 14:22:24 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 14:22:41 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: style/style.css ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 14:22:41 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: style/style.css ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 14:22:41 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 14:22:41 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 14:22:54 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL links was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2011-09-18 14:22:54 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL links was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#3 {main}
2011-09-18 14:22:54 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 14:22:54 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 14:22:58 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 14:22:58 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 14:25:59 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 14:25:59 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 15:02:58 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 15:02:58 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 15:03:13 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL problemlist was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2011-09-18 15:03:13 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL problemlist was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#3 {main}
2011-09-18 15:03:13 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 15:03:13 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 15:04:14 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL problemlist was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2011-09-18 15:04:14 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL problemlist was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#3 {main}
2011-09-18 15:04:14 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 15:04:14 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 15:04:31 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL problemlist/222 was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2011-09-18 15:04:31 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL problemlist/222 was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#3 {main}
2011-09-18 15:04:31 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 15:04:31 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 15:05:06 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL problemlist was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2011-09-18 15:05:06 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL problemlist was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#3 {main}
2011-09-18 15:05:06 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 15:05:06 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 15:05:07 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL problemlist was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2011-09-18 15:05:07 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL problemlist was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#3 {main}
2011-09-18 15:05:07 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 15:05:07 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 15:06:00 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL problemlist was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2011-09-18 15:06:00 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL problemlist was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#3 {main}
2011-09-18 15:06:00 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 15:06:00 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 15:07:35 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL problemlist was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2011-09-18 15:07:35 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL problemlist was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#3 {main}
2011-09-18 15:07:35 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 15:07:35 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 15:08:00 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problemlist ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 15:08:00 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problemlist ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 15:08:00 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 15:08:00 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 15:08:12 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL problemlist was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2011-09-18 15:08:12 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL problemlist was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#3 {main}
2011-09-18 15:08:12 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 15:08:12 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 15:08:16 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL problemlist/1 was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2011-09-18 15:08:16 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL problemlist/1 was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#3 {main}
2011-09-18 15:08:16 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 15:08:16 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 15:08:49 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL home was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 113 ]
2011-09-18 15:08:49 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL home was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 113 ]
--
#0 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#3 {main}
2011-09-18 15:08:49 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 15:08:49 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 15:09:36 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: style/style.css ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 15:09:36 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: style/style.css ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 15:09:36 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 15:09:36 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 15:10:53 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: style/style.css ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 15:10:53 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: style/style.css ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 15:10:53 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 15:10:53 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 15:11:15 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: style/style.css ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 15:11:15 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: style/style.css ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 15:11:15 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 15:11:15 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 15:11:58 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: style/style.css ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 15:11:58 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: style/style.css ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 15:11:58 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 15:11:58 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 15:14:02 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: style/style.css ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 15:14:02 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: style/style.css ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 15:14:02 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 15:14:02 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 15:14:44 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: style/style.css ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 15:14:44 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: style/style.css ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 15:14:44 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 15:14:44 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 15:15:02 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: style/style.css ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 15:15:02 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: style/style.css ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 15:15:02 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 15:15:02 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 15:15:34 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: style/style.css ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 15:15:34 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: style/style.css ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 15:15:34 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 15:15:34 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 15:15:52 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: style/style.css ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 15:15:52 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: style/style.css ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 15:15:52 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 15:15:52 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 15:25:57 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: style/style.css ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 15:25:57 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: style/style.css ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 15:25:57 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 15:25:57 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 16:04:12 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: style/style.css ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 16:04:12 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: style/style.css ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 16:04:12 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 16:04:12 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 16:14:52 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: style/style.css ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 16:14:52 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: style/style.css ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 16:14:52 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 16:14:52 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 16:16:05 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: style/style.css ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 16:16:05 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: style/style.css ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 16:16:05 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 16:16:05 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 16:17:42 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: style/style.css ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 16:17:42 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: style/style.css ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 16:17:42 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 16:17:42 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 16:21:19 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: style/style.css ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 16:21:19 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: style/style.css ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 16:21:19 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 16:21:19 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 16:22:06 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: style/style.css ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 16:22:06 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: style/style.css ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 16:22:06 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 16:22:06 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 16:23:28 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: style/style.css ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 16:23:28 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: style/style.css ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 16:23:28 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 16:23:28 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 16:24:24 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: style/style.css ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 16:24:24 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: style/style.css ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 16:24:24 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 16:24:24 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 16:44:32 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: style/style.css ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 16:44:32 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: style/style.css ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 16:44:32 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 16:44:32 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 16:44:38 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL problemlist was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2011-09-18 16:44:38 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL problemlist was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#3 {main}
2011-09-18 16:44:38 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 16:44:38 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 16:44:49 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL problemlist was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2011-09-18 16:44:49 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL problemlist was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#3 {main}
2011-09-18 16:44:49 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 16:44:49 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 16:45:39 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL problemlist was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2011-09-18 16:45:39 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL problemlist was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#3 {main}
2011-09-18 16:45:39 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 16:45:39 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 16:46:06 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL problemlist was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2011-09-18 16:46:06 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL problemlist was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#3 {main}
2011-09-18 16:46:06 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 16:46:06 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 17:53:10 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL problemlist was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2011-09-18 17:53:10 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL problemlist was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#3 {main}
2011-09-18 17:53:10 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 17:53:10 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 17:53:56 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL problemlist was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2011-09-18 17:53:56 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL problemlist was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#3 {main}
2011-09-18 17:53:56 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 17:53:56 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 17:54:08 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problemlist ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 17:54:08 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problemlist ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 17:54:08 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 17:54:08 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 17:54:09 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problemlist ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 17:54:09 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problemlist ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 17:54:09 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 17:54:09 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 17:54:09 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problemlist ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 17:54:09 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problemlist ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 17:54:09 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 17:54:09 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 18:30:39 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL problemlist was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2011-09-18 18:30:39 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL problemlist was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#3 {main}
2011-09-18 18:30:39 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 18:30:39 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 18:30:49 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL problemlist was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2011-09-18 18:30:49 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL problemlist was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#3 {main}
2011-09-18 18:30:49 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 18:30:49 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 18:32:39 --- ERROR: ErrorException [ 8 ]: Undefined variable: body ~ APPPATH\views\layout.php [ 13 ]
2011-09-18 18:32:39 --- STRACE: ErrorException [ 8 ]: Undefined variable: body ~ APPPATH\views\layout.php [ 13 ]
--
#0 D:\workspace\hustoj\application\views\layout.php(13): Kohana_Core::error_handler('D:\workspace\hu...', Array)
#1 D:\workspace\hustoj\system\classes\kohana\view.php(61): include('D:\workspace\hu...')
#2 D:\workspace\hustoj\system\classes\kohana\view.php(343): Kohana_View::capture()
#3 D:\workspace\hustoj\system\classes\kohana\view.php(228): Kohana_View->render()
#4 D:\workspace\hustoj\system\classes\kohana\response.php(160): Kohana_View->__toString(Object(View))
#5 D:\workspace\hustoj\application\classes\controller\my.php(14): Kohana_Response->body()
#6 [internal function]: Controller_My->after(Object(Controller_Problem))
#7 D:\workspace\hustoj\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Request))
#8 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#9 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute()
#10 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#11 {main}
2011-09-18 18:32:40 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 18:32:40 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 18:33:00 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: style/style.css ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 18:33:00 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: style/style.css ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 18:33:00 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 18:33:00 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 18:34:51 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: style/style.css ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 18:34:51 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: style/style.css ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 18:34:52 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 18:34:52 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 18:36:42 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: style/style.css ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 18:36:42 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: style/style.css ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 18:36:42 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 18:36:42 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 18:36:45 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: style/style.css ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 18:36:45 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: style/style.css ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 18:36:45 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 18:36:45 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 18:37:19 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/static/style/style.css ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 18:37:19 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/static/style/style.css ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 18:37:19 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 18:37:19 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 18:37:20 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/static/style/style.css ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 18:37:20 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/static/style/style.css ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 18:37:20 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 18:37:20 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 18:37:20 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/static/style/style.css ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 18:37:20 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/static/style/style.css ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 18:37:20 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 18:37:20 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 18:37:38 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 18:37:38 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 18:37:48 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 18:37:48 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 18:37:48 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 18:37:48 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 18:38:37 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 18:38:37 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 18:38:38 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 18:38:38 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 18:38:48 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 18:38:48 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 18:38:49 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 18:38:49 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 18:38:55 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/list/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 18:38:55 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/list/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 18:41:18 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/list/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 18:41:18 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/list/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 18:41:26 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 18:41:26 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 18:41:35 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 18:41:35 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 19:40:39 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 19:40:39 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 19:41:41 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 19:41:41 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 19:44:09 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 19:44:09 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 19:50:03 --- ERROR: ErrorException [ 4 ]: syntax error, unexpected T_VARIABLE ~ APPPATH\classes\controller\problem.php [ 10 ]
2011-09-18 19:50:03 --- STRACE: ErrorException [ 4 ]: syntax error, unexpected T_VARIABLE ~ APPPATH\classes\controller\problem.php [ 10 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler('controller_prob...')
#1 {main}
2011-09-18 19:50:03 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 19:50:03 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 19:50:42 --- ERROR: ErrorException [ 4 ]: syntax error, unexpected T_VARIABLE ~ APPPATH\classes\controller\problem.php [ 10 ]
2011-09-18 19:50:42 --- STRACE: ErrorException [ 4 ]: syntax error, unexpected T_VARIABLE ~ APPPATH\classes\controller\problem.php [ 10 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler('controller_prob...')
#1 {main}
2011-09-18 19:50:43 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 19:50:43 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 19:50:59 --- ERROR: ErrorException [ 4 ]: syntax error, unexpected ')' ~ APPPATH\classes\controller\problem.php [ 10 ]
2011-09-18 19:50:59 --- STRACE: ErrorException [ 4 ]: syntax error, unexpected ')' ~ APPPATH\classes\controller\problem.php [ 10 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler('controller_prob...')
#1 {main}
2011-09-18 19:50:59 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 19:50:59 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 19:51:03 --- ERROR: ErrorException [ 4 ]: syntax error, unexpected T_VARIABLE ~ APPPATH\classes\controller\problem.php [ 19 ]
2011-09-18 19:51:03 --- STRACE: ErrorException [ 4 ]: syntax error, unexpected T_VARIABLE ~ APPPATH\classes\controller\problem.php [ 19 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler('controller_prob...')
#1 {main}
2011-09-18 19:51:03 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 19:51:03 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 19:51:52 --- ERROR: ErrorException [ 4 ]: syntax error, unexpected T_VARIABLE ~ APPPATH\classes\controller\problem.php [ 24 ]
2011-09-18 19:51:52 --- STRACE: ErrorException [ 4 ]: syntax error, unexpected T_VARIABLE ~ APPPATH\classes\controller\problem.php [ 24 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler('controller_prob...')
#1 {main}
2011-09-18 19:51:53 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 19:51:53 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 19:52:06 --- ERROR: ErrorException [ 1 ]: Class 'Problem' not found ~ APPPATH\classes\controller\problem.php [ 14 ]
2011-09-18 19:52:06 --- STRACE: ErrorException [ 1 ]: Class 'Problem' not found ~ APPPATH\classes\controller\problem.php [ 14 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2011-09-18 19:52:06 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 19:52:06 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 19:52:13 --- ERROR: ErrorException [ 1 ]: Class 'problem' not found ~ APPPATH\classes\controller\problem.php [ 14 ]
2011-09-18 19:52:13 --- STRACE: ErrorException [ 1 ]: Class 'problem' not found ~ APPPATH\classes\controller\problem.php [ 14 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2011-09-18 19:52:14 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 19:52:14 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 19:55:05 --- ERROR: ErrorException [ 1 ]: Class 'Problem_Model' not found ~ APPPATH\classes\controller\problem.php [ 14 ]
2011-09-18 19:55:05 --- STRACE: ErrorException [ 1 ]: Class 'Problem_Model' not found ~ APPPATH\classes\controller\problem.php [ 14 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2011-09-18 19:55:05 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 19:55:05 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 19:55:53 --- ERROR: ErrorException [ 1 ]: Class 'Cache' not found ~ APPPATH\classes\model\problem.php [ 34 ]
2011-09-18 19:55:53 --- STRACE: ErrorException [ 1 ]: Class 'Cache' not found ~ APPPATH\classes\model\problem.php [ 34 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler(1)
#1 {main}
2011-09-18 19:55:53 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 19:55:53 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 19:56:06 --- ERROR: ErrorException [ 8 ]: Undefined property: Model_Problem::$db ~ APPPATH\classes\model\problem.php [ 39 ]
2011-09-18 19:56:06 --- STRACE: ErrorException [ 8 ]: Undefined property: Model_Problem::$db ~ APPPATH\classes\model\problem.php [ 39 ]
--
#0 D:\workspace\hustoj\application\classes\model\problem.php(39): Kohana_Core::error_handler(1)
#1 D:\workspace\hustoj\application\classes\controller\problem.php(16): Model_Problem->get_one_page()
#2 [internal function]: Controller_Problem->action_list(Object(Controller_Problem))
#3 D:\workspace\hustoj\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Request))
#4 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute()
#6 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#7 {main}
2011-09-18 19:56:06 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 19:56:06 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 19:56:36 --- ERROR: ErrorException [ 8 ]: Undefined property: Model_Problem::$db ~ APPPATH\classes\model\problem.php [ 39 ]
2011-09-18 19:56:36 --- STRACE: ErrorException [ 8 ]: Undefined property: Model_Problem::$db ~ APPPATH\classes\model\problem.php [ 39 ]
--
#0 D:\workspace\hustoj\application\classes\model\problem.php(39): Kohana_Core::error_handler(1)
#1 D:\workspace\hustoj\application\classes\controller\problem.php(16): Model_Problem->get_one_page()
#2 [internal function]: Controller_Problem->action_list(Object(Controller_Problem))
#3 D:\workspace\hustoj\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Request))
#4 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute()
#6 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#7 {main}
2011-09-18 19:56:37 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 19:56:37 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 20:04:47 --- ERROR: ErrorException [ 8 ]: Undefined property: Model_Problem::$db ~ APPPATH\classes\model\problem.php [ 35 ]
2011-09-18 20:04:47 --- STRACE: ErrorException [ 8 ]: Undefined property: Model_Problem::$db ~ APPPATH\classes\model\problem.php [ 35 ]
--
#0 D:\workspace\hustoj\application\classes\model\problem.php(35): Kohana_Core::error_handler(1)
#1 D:\workspace\hustoj\application\classes\controller\problem.php(16): Model_Problem->get_one_page()
#2 [internal function]: Controller_Problem->action_list(Object(Controller_Problem))
#3 D:\workspace\hustoj\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Request))
#4 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute()
#6 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#7 {main}
2011-09-18 20:04:48 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 20:04:48 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 20:04:49 --- ERROR: ErrorException [ 8 ]: Undefined property: Model_Problem::$db ~ APPPATH\classes\model\problem.php [ 35 ]
2011-09-18 20:04:49 --- STRACE: ErrorException [ 8 ]: Undefined property: Model_Problem::$db ~ APPPATH\classes\model\problem.php [ 35 ]
--
#0 D:\workspace\hustoj\application\classes\model\problem.php(35): Kohana_Core::error_handler(1)
#1 D:\workspace\hustoj\application\classes\controller\problem.php(16): Model_Problem->get_one_page()
#2 [internal function]: Controller_Problem->action_list(Object(Controller_Problem))
#3 D:\workspace\hustoj\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Request))
#4 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute()
#6 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#7 {main}
2011-09-18 20:04:49 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 20:04:49 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 20:06:35 --- ERROR: ErrorException [ 8 ]: Undefined property: Model_Problem::$db ~ APPPATH\classes\model\problem.php [ 36 ]
2011-09-18 20:06:35 --- STRACE: ErrorException [ 8 ]: Undefined property: Model_Problem::$db ~ APPPATH\classes\model\problem.php [ 36 ]
--
#0 D:\workspace\hustoj\application\classes\model\problem.php(36): Kohana_Core::error_handler(1)
#1 D:\workspace\hustoj\application\classes\controller\problem.php(16): Model_Problem->get_one_page()
#2 [internal function]: Controller_Problem->action_list(Object(Controller_Problem))
#3 D:\workspace\hustoj\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Request))
#4 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute()
#6 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#7 {main}
2011-09-18 20:06:35 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 20:06:35 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 20:06:44 --- ERROR: ErrorException [ 8 ]: Undefined property: Model_Problem::$db ~ APPPATH\classes\model\problem.php [ 36 ]
2011-09-18 20:06:44 --- STRACE: ErrorException [ 8 ]: Undefined property: Model_Problem::$db ~ APPPATH\classes\model\problem.php [ 36 ]
--
#0 D:\workspace\hustoj\application\classes\model\problem.php(36): Kohana_Core::error_handler(1)
#1 D:\workspace\hustoj\application\classes\controller\problem.php(16): Model_Problem->get_one_page()
#2 [internal function]: Controller_Problem->action_list(Object(Controller_Problem))
#3 D:\workspace\hustoj\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Request))
#4 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute()
#6 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#7 {main}
2011-09-18 20:06:44 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 20:06:44 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 20:06:46 --- ERROR: ErrorException [ 8 ]: Undefined property: Model_Problem::$db ~ APPPATH\classes\model\problem.php [ 36 ]
2011-09-18 20:06:46 --- STRACE: ErrorException [ 8 ]: Undefined property: Model_Problem::$db ~ APPPATH\classes\model\problem.php [ 36 ]
--
#0 D:\workspace\hustoj\application\classes\model\problem.php(36): Kohana_Core::error_handler(1)
#1 D:\workspace\hustoj\application\classes\controller\problem.php(16): Model_Problem->get_one_page()
#2 [internal function]: Controller_Problem->action_list(Object(Controller_Problem))
#3 D:\workspace\hustoj\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Request))
#4 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute()
#6 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#7 {main}
2011-09-18 20:06:46 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 20:06:46 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 20:06:57 --- ERROR: ErrorException [ 8 ]: Undefined property: Model_Problem::$db ~ APPPATH\classes\model\problem.php [ 36 ]
2011-09-18 20:06:57 --- STRACE: ErrorException [ 8 ]: Undefined property: Model_Problem::$db ~ APPPATH\classes\model\problem.php [ 36 ]
--
#0 D:\workspace\hustoj\application\classes\model\problem.php(36): Kohana_Core::error_handler(1)
#1 D:\workspace\hustoj\application\classes\controller\problem.php(16): Model_Problem->get_one_page()
#2 [internal function]: Controller_Problem->action_list(Object(Controller_Problem))
#3 D:\workspace\hustoj\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Request))
#4 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute()
#6 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#7 {main}
2011-09-18 20:06:57 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 20:06:57 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 20:06:58 --- ERROR: ErrorException [ 8 ]: Undefined property: Model_Problem::$db ~ APPPATH\classes\model\problem.php [ 36 ]
2011-09-18 20:06:58 --- STRACE: ErrorException [ 8 ]: Undefined property: Model_Problem::$db ~ APPPATH\classes\model\problem.php [ 36 ]
--
#0 D:\workspace\hustoj\application\classes\model\problem.php(36): Kohana_Core::error_handler(1)
#1 D:\workspace\hustoj\application\classes\controller\problem.php(16): Model_Problem->get_one_page()
#2 [internal function]: Controller_Problem->action_list(Object(Controller_Problem))
#3 D:\workspace\hustoj\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Request))
#4 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute()
#6 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#7 {main}
2011-09-18 20:06:58 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 20:06:58 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 20:07:18 --- ERROR: ErrorException [ 8 ]: Undefined property: Model_Problem::$db ~ APPPATH\classes\model\problem.php [ 36 ]
2011-09-18 20:07:18 --- STRACE: ErrorException [ 8 ]: Undefined property: Model_Problem::$db ~ APPPATH\classes\model\problem.php [ 36 ]
--
#0 D:\workspace\hustoj\application\classes\model\problem.php(36): Kohana_Core::error_handler(1)
#1 D:\workspace\hustoj\application\classes\controller\problem.php(16): Model_Problem->get_one_page()
#2 [internal function]: Controller_Problem->action_list(Object(Controller_Problem))
#3 D:\workspace\hustoj\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Request))
#4 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute()
#6 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#7 {main}
2011-09-18 20:07:18 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 20:07:18 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 20:07:20 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 20:07:20 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 20:07:59 --- ERROR: ErrorException [ 8 ]: Undefined property: Model_Problem::$db ~ APPPATH\classes\model\problem.php [ 36 ]
2011-09-18 20:07:59 --- STRACE: ErrorException [ 8 ]: Undefined property: Model_Problem::$db ~ APPPATH\classes\model\problem.php [ 36 ]
--
#0 D:\workspace\hustoj\application\classes\model\problem.php(36): Kohana_Core::error_handler(1)
#1 D:\workspace\hustoj\application\classes\controller\problem.php(16): Model_Problem->get_one_page()
#2 [internal function]: Controller_Problem->action_list(Object(Controller_Problem))
#3 D:\workspace\hustoj\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Request))
#4 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute()
#6 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#7 {main}
2011-09-18 20:07:59 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 20:07:59 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 20:08:06 --- ERROR: ErrorException [ 8 ]: Undefined property: Model_Problem::$db ~ APPPATH\classes\model\problem.php [ 36 ]
2011-09-18 20:08:06 --- STRACE: ErrorException [ 8 ]: Undefined property: Model_Problem::$db ~ APPPATH\classes\model\problem.php [ 36 ]
--
#0 D:\workspace\hustoj\application\classes\model\problem.php(36): Kohana_Core::error_handler(1)
#1 D:\workspace\hustoj\application\classes\controller\problem.php(16): Model_Problem->get_one_page()
#2 [internal function]: Controller_Problem->action_list(Object(Controller_Problem))
#3 D:\workspace\hustoj\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Request))
#4 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute()
#6 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#7 {main}
2011-09-18 20:08:07 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 20:08:07 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 20:08:10 --- ERROR: ErrorException [ 8 ]: Undefined property: Model_Problem::$db ~ APPPATH\classes\model\problem.php [ 36 ]
2011-09-18 20:08:10 --- STRACE: ErrorException [ 8 ]: Undefined property: Model_Problem::$db ~ APPPATH\classes\model\problem.php [ 36 ]
--
#0 D:\workspace\hustoj\application\classes\model\problem.php(36): Kohana_Core::error_handler(1)
#1 D:\workspace\hustoj\application\classes\controller\problem.php(16): Model_Problem->get_one_page()
#2 [internal function]: Controller_Problem->action_list(Object(Controller_Problem))
#3 D:\workspace\hustoj\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Request))
#4 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute()
#6 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#7 {main}
2011-09-18 20:08:10 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 20:08:10 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 20:09:18 --- ERROR: ErrorException [ 8 ]: Undefined property: Model_Problem::$db ~ APPPATH\classes\model\problem.php [ 36 ]
2011-09-18 20:09:18 --- STRACE: ErrorException [ 8 ]: Undefined property: Model_Problem::$db ~ APPPATH\classes\model\problem.php [ 36 ]
--
#0 D:\workspace\hustoj\application\classes\model\problem.php(36): Kohana_Core::error_handler(1)
#1 D:\workspace\hustoj\application\classes\controller\problem.php(16): Model_Problem->get_one_page()
#2 [internal function]: Controller_Problem->action_list(Object(Controller_Problem))
#3 D:\workspace\hustoj\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Request))
#4 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute()
#6 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#7 {main}
2011-09-18 20:09:18 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 20:09:18 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 20:09:22 --- ERROR: ErrorException [ 8 ]: Undefined property: Model_Problem::$db ~ APPPATH\classes\model\problem.php [ 36 ]
2011-09-18 20:09:22 --- STRACE: ErrorException [ 8 ]: Undefined property: Model_Problem::$db ~ APPPATH\classes\model\problem.php [ 36 ]
--
#0 D:\workspace\hustoj\application\classes\model\problem.php(36): Kohana_Core::error_handler(1)
#1 D:\workspace\hustoj\application\classes\controller\problem.php(16): Model_Problem->get_one_page()
#2 [internal function]: Controller_Problem->action_list(Object(Controller_Problem))
#3 D:\workspace\hustoj\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Request))
#4 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute()
#6 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#7 {main}
2011-09-18 20:09:22 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 20:09:22 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 20:09:32 --- ERROR: ErrorException [ 8 ]: Undefined property: Model_Problem::$db ~ APPPATH\classes\model\problem.php [ 36 ]
2011-09-18 20:09:32 --- STRACE: ErrorException [ 8 ]: Undefined property: Model_Problem::$db ~ APPPATH\classes\model\problem.php [ 36 ]
--
#0 D:\workspace\hustoj\application\classes\model\problem.php(36): Kohana_Core::error_handler(1)
#1 D:\workspace\hustoj\application\classes\controller\problem.php(16): Model_Problem->get_one_page()
#2 [internal function]: Controller_Problem->action_list(Object(Controller_Problem))
#3 D:\workspace\hustoj\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Request))
#4 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute()
#6 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#7 {main}
2011-09-18 20:09:32 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 20:09:32 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 20:09:34 --- ERROR: ErrorException [ 8 ]: Undefined property: Model_Problem::$db ~ APPPATH\classes\model\problem.php [ 36 ]
2011-09-18 20:09:34 --- STRACE: ErrorException [ 8 ]: Undefined property: Model_Problem::$db ~ APPPATH\classes\model\problem.php [ 36 ]
--
#0 D:\workspace\hustoj\application\classes\model\problem.php(36): Kohana_Core::error_handler(1)
#1 D:\workspace\hustoj\application\classes\controller\problem.php(16): Model_Problem->get_one_page()
#2 [internal function]: Controller_Problem->action_list(Object(Controller_Problem))
#3 D:\workspace\hustoj\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Request))
#4 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute()
#6 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#7 {main}
2011-09-18 20:09:35 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 20:09:35 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 20:10:18 --- ERROR: ErrorException [ 8 ]: Undefined property: Model_Problem::$db ~ APPPATH\classes\model\problem.php [ 36 ]
2011-09-18 20:10:18 --- STRACE: ErrorException [ 8 ]: Undefined property: Model_Problem::$db ~ APPPATH\classes\model\problem.php [ 36 ]
--
#0 D:\workspace\hustoj\application\classes\model\problem.php(36): Kohana_Core::error_handler(1)
#1 D:\workspace\hustoj\application\classes\controller\problem.php(16): Model_Problem->get_one_page()
#2 [internal function]: Controller_Problem->action_list(Object(Controller_Problem))
#3 D:\workspace\hustoj\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Request))
#4 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute()
#6 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#7 {main}
2011-09-18 20:10:18 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 20:10:18 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 20:10:27 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 20:10:27 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 20:11:30 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 20:11:30 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 20:15:42 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 20:15:42 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 20:16:47 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 20:16:47 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 20:16:53 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 20:16:53 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 20:21:29 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 20:21:29 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 20:21:37 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 20:21:37 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 20:24:44 --- ERROR: ErrorException [ 1 ]: Call to undefined method Database_MySQL::select() ~ APPPATH\classes\model\problem.php [ 36 ]
2011-09-18 20:24:44 --- STRACE: ErrorException [ 1 ]: Call to undefined method Database_MySQL::select() ~ APPPATH\classes\model\problem.php [ 36 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler(1)
#1 {main}
2011-09-18 20:24:44 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 20:24:44 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 20:24:50 --- ERROR: ErrorException [ 1 ]: Call to undefined method Database_MySQL::select() ~ APPPATH\classes\model\problem.php [ 36 ]
2011-09-18 20:24:50 --- STRACE: ErrorException [ 1 ]: Call to undefined method Database_MySQL::select() ~ APPPATH\classes\model\problem.php [ 36 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler(1)
#1 {main}
2011-09-18 20:24:51 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 20:24:51 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 20:28:56 --- ERROR: ErrorException [ 8 ]: Undefined property: Model_Problem::$db ~ APPPATH\classes\model\problem.php [ 36 ]
2011-09-18 20:28:56 --- STRACE: ErrorException [ 8 ]: Undefined property: Model_Problem::$db ~ APPPATH\classes\model\problem.php [ 36 ]
--
#0 D:\workspace\hustoj\application\classes\model\problem.php(36): Kohana_Core::error_handler(1)
#1 D:\workspace\hustoj\application\classes\controller\problem.php(16): Model_Problem->get_one_page()
#2 [internal function]: Controller_Problem->action_list(Object(Controller_Problem))
#3 D:\workspace\hustoj\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Request))
#4 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute()
#6 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#7 {main}
2011-09-18 20:28:56 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 20:28:56 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 20:28:58 --- ERROR: ErrorException [ 8 ]: Undefined property: Model_Problem::$db ~ APPPATH\classes\model\problem.php [ 36 ]
2011-09-18 20:28:58 --- STRACE: ErrorException [ 8 ]: Undefined property: Model_Problem::$db ~ APPPATH\classes\model\problem.php [ 36 ]
--
#0 D:\workspace\hustoj\application\classes\model\problem.php(36): Kohana_Core::error_handler(1)
#1 D:\workspace\hustoj\application\classes\controller\problem.php(16): Model_Problem->get_one_page()
#2 [internal function]: Controller_Problem->action_list(Object(Controller_Problem))
#3 D:\workspace\hustoj\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Request))
#4 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute()
#6 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#7 {main}
2011-09-18 20:28:58 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 20:28:58 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 20:34:22 --- ERROR: ErrorException [ 1 ]: Call to undefined method DB::instance() ~ APPPATH\classes\model\problem.php [ 34 ]
2011-09-18 20:34:22 --- STRACE: ErrorException [ 1 ]: Call to undefined method DB::instance() ~ APPPATH\classes\model\problem.php [ 34 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler(1)
#1 {main}
2011-09-18 20:34:22 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 20:34:22 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 20:35:07 --- ERROR: ErrorException [ 1 ]: Call to undefined method Database_MySQL::select() ~ APPPATH\classes\model\problem.php [ 36 ]
2011-09-18 20:35:07 --- STRACE: ErrorException [ 1 ]: Call to undefined method Database_MySQL::select() ~ APPPATH\classes\model\problem.php [ 36 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler(1)
#1 {main}
2011-09-18 20:35:07 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 20:35:07 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 20:36:41 --- ERROR: ErrorException [ 1 ]: Call to undefined method DB::instance() ~ APPPATH\classes\model\problem.php [ 34 ]
2011-09-18 20:36:41 --- STRACE: ErrorException [ 1 ]: Call to undefined method DB::instance() ~ APPPATH\classes\model\problem.php [ 34 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler(1)
#1 {main}
2011-09-18 20:36:41 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 20:36:41 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 20:38:18 --- ERROR: ErrorException [ 1 ]: Call to undefined method Database_MySQL_Result::as_object() ~ APPPATH\classes\model\problem.php [ 37 ]
2011-09-18 20:38:18 --- STRACE: ErrorException [ 1 ]: Call to undefined method Database_MySQL_Result::as_object() ~ APPPATH\classes\model\problem.php [ 37 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler(1)
#1 {main}
2011-09-18 20:38:18 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 20:38:18 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 20:38:40 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 20:38:40 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 20:43:51 --- ERROR: ErrorException [ 1 ]: Call to undefined method Database_Query_Builder_Select::orderby() ~ APPPATH\classes\model\problem.php [ 42 ]
2011-09-18 20:43:51 --- STRACE: ErrorException [ 1 ]: Call to undefined method Database_Query_Builder_Select::orderby() ~ APPPATH\classes\model\problem.php [ 42 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler(1)
#1 {main}
2011-09-18 20:43:51 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 20:43:51 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 20:45:09 --- ERROR: ErrorException [ 8 ]: Undefined property: Model_Problem::$db ~ APPPATH\classes\model\problem.php [ 44 ]
2011-09-18 20:45:09 --- STRACE: ErrorException [ 8 ]: Undefined property: Model_Problem::$db ~ APPPATH\classes\model\problem.php [ 44 ]
--
#0 D:\workspace\hustoj\application\classes\model\problem.php(44): Kohana_Core::error_handler(1)
#1 D:\workspace\hustoj\application\classes\controller\problem.php(16): Model_Problem->get_one_page()
#2 [internal function]: Controller_Problem->action_list(Object(Controller_Problem))
#3 D:\workspace\hustoj\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Request))
#4 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute()
#6 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#7 {main}
2011-09-18 20:45:09 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 20:45:09 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 20:46:38 --- ERROR: ErrorException [ 1 ]: Call to undefined method Database_MySQL_Result::as_object() ~ APPPATH\classes\model\problem.php [ 44 ]
2011-09-18 20:46:38 --- STRACE: ErrorException [ 1 ]: Call to undefined method Database_MySQL_Result::as_object() ~ APPPATH\classes\model\problem.php [ 44 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler(1)
#1 {main}
2011-09-18 20:46:38 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 20:46:38 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 20:46:45 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 20:46:45 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 20:47:16 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 20:47:16 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 20:47:25 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 20:47:25 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 20:47:34 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 20:47:34 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 20:48:11 --- ERROR: ErrorException [ 4 ]: syntax error, unexpected T_STRING ~ APPPATH\classes\model\problem.php [ 45 ]
2011-09-18 20:48:11 --- STRACE: ErrorException [ 4 ]: syntax error, unexpected T_STRING ~ APPPATH\classes\model\problem.php [ 45 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler('Model_Problem')
#1 {main}
2011-09-18 20:48:12 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 20:48:12 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 20:48:46 --- ERROR: ErrorException [ 4 ]: syntax error, unexpected ',' ~ APPPATH\classes\model\problem.php [ 46 ]
2011-09-18 20:48:46 --- STRACE: ErrorException [ 4 ]: syntax error, unexpected ',' ~ APPPATH\classes\model\problem.php [ 46 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler('Model_Problem')
#1 {main}
2011-09-18 20:48:46 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 20:48:46 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 20:48:58 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 20:48:58 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 20:50:36 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 20:50:36 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 20:52:45 --- ERROR: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH\classes\model\problem.php [ 39 ]
2011-09-18 20:52:45 --- STRACE: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH\classes\model\problem.php [ 39 ]
--
#0 D:\workspace\hustoj\application\classes\model\problem.php(39): Kohana_Core::error_handler(1)
#1 D:\workspace\hustoj\application\classes\controller\problem.php(16): Model_Problem->get_one_page()
#2 [internal function]: Controller_Problem->action_list(Object(Controller_Problem))
#3 D:\workspace\hustoj\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Request))
#4 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute()
#6 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#7 {main}
2011-09-18 20:52:45 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 20:52:45 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 20:53:00 --- ERROR: ErrorException [ 8 ]: Undefined property: stdClass::$problem_id ~ APPPATH\classes\model\problem.php [ 39 ]
2011-09-18 20:53:00 --- STRACE: ErrorException [ 8 ]: Undefined property: stdClass::$problem_id ~ APPPATH\classes\model\problem.php [ 39 ]
--
#0 D:\workspace\hustoj\application\classes\model\problem.php(39): Kohana_Core::error_handler(1)
#1 D:\workspace\hustoj\application\classes\controller\problem.php(16): Model_Problem->get_one_page()
#2 [internal function]: Controller_Problem->action_list(Object(Controller_Problem))
#3 D:\workspace\hustoj\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Request))
#4 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute()
#6 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#7 {main}
2011-09-18 20:53:00 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 20:53:00 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 20:53:03 --- ERROR: ErrorException [ 8 ]: Undefined property: stdClass::$problem_id ~ APPPATH\classes\model\problem.php [ 39 ]
2011-09-18 20:53:03 --- STRACE: ErrorException [ 8 ]: Undefined property: stdClass::$problem_id ~ APPPATH\classes\model\problem.php [ 39 ]
--
#0 D:\workspace\hustoj\application\classes\model\problem.php(39): Kohana_Core::error_handler(1)
#1 D:\workspace\hustoj\application\classes\controller\problem.php(16): Model_Problem->get_one_page()
#2 [internal function]: Controller_Problem->action_list(Object(Controller_Problem))
#3 D:\workspace\hustoj\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Request))
#4 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute()
#6 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#7 {main}
2011-09-18 20:53:03 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 20:53:03 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 20:53:20 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 20:53:20 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 20:53:23 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 20:53:23 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 20:53:42 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 20:53:42 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 21:37:17 --- ERROR: ErrorException [ 4 ]: syntax error, unexpected T_VARIABLE ~ APPPATH\classes\model\problem.php [ 22 ]
2011-09-18 21:37:17 --- STRACE: ErrorException [ 4 ]: syntax error, unexpected T_VARIABLE ~ APPPATH\classes\model\problem.php [ 22 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler('Model_Problem')
#1 {main}
2011-09-18 21:37:18 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 21:37:18 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 21:37:32 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 21:37:32 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 21:37:40 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 21:37:40 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 21:40:39 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 21:40:39 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 21:42:49 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 21:42:49 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 21:48:46 --- ERROR: ErrorException [ 4 ]: syntax error, unexpected $end ~ APPPATH\views\problem\list.php [ 11 ]
2011-09-18 21:48:46 --- STRACE: ErrorException [ 4 ]: syntax error, unexpected $end ~ APPPATH\views\problem\list.php [ 11 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler('D:\workspace\hu...', Array)
#1 {main}
2011-09-18 21:48:46 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 21:48:46 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 21:49:12 --- ERROR: ErrorException [ 2 ]: mysql_fetch_object(): supplied argument is not a valid MySQL result resource ~ MODPATH\database\classes\kohana\database\mysql\result.php [ 57 ]
2011-09-18 21:49:12 --- STRACE: ErrorException [ 2 ]: mysql_fetch_object(): supplied argument is not a valid MySQL result resource ~ MODPATH\database\classes\kohana\database\mysql\result.php [ 57 ]
--
#0 [internal function]: Kohana_Core::error_handler(0)
#1 D:\workspace\hustoj\modules\database\classes\kohana\database\mysql\result.php(57): mysql_fetch_object()
#2 D:\workspace\hustoj\application\views\problem\list.php(5): Kohana_Database_MySQL_Result->current('D:\workspace\hu...', Array)
#3 D:\workspace\hustoj\system\classes\kohana\view.php(61): include('D:\workspace\hu...')
#4 D:\workspace\hustoj\system\classes\kohana\view.php(343): Kohana_View::capture()
#5 D:\workspace\hustoj\system\classes\kohana\view.php(228): Kohana_View->render()
#6 D:\workspace\hustoj\application\views\layout.php(13): Kohana_View->__toString('D:\workspace\hu...', Array)
#7 D:\workspace\hustoj\system\classes\kohana\view.php(61): include('D:\workspace\hu...')
#8 D:\workspace\hustoj\system\classes\kohana\view.php(343): Kohana_View::capture()
#9 D:\workspace\hustoj\system\classes\kohana\view.php(228): Kohana_View->render()
#10 D:\workspace\hustoj\system\classes\kohana\response.php(160): Kohana_View->__toString(Object(View))
#11 D:\workspace\hustoj\application\classes\controller\my.php(14): Kohana_Response->body()
#12 [internal function]: Controller_My->after(Object(Controller_Problem))
#13 D:\workspace\hustoj\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Request))
#14 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#15 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute()
#16 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#17 {main}
2011-09-18 21:49:13 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 21:49:13 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 21:50:28 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 21:50:28 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 21:51:33 --- ERROR: ErrorException [ 2 ]: mysql_fetch_object(): supplied argument is not a valid MySQL result resource ~ MODPATH\database\classes\kohana\database\mysql\result.php [ 57 ]
2011-09-18 21:51:33 --- STRACE: ErrorException [ 2 ]: mysql_fetch_object(): supplied argument is not a valid MySQL result resource ~ MODPATH\database\classes\kohana\database\mysql\result.php [ 57 ]
--
#0 [internal function]: Kohana_Core::error_handler(0)
#1 D:\workspace\hustoj\modules\database\classes\kohana\database\mysql\result.php(57): mysql_fetch_object()
#2 D:\workspace\hustoj\application\views\problem\list.php(4): Kohana_Database_MySQL_Result->current('D:\workspace\hu...', Array)
#3 D:\workspace\hustoj\system\classes\kohana\view.php(61): include('D:\workspace\hu...')
#4 D:\workspace\hustoj\system\classes\kohana\view.php(343): Kohana_View::capture()
#5 D:\workspace\hustoj\system\classes\kohana\view.php(228): Kohana_View->render()
#6 D:\workspace\hustoj\application\views\layout.php(13): Kohana_View->__toString('D:\workspace\hu...', Array)
#7 D:\workspace\hustoj\system\classes\kohana\view.php(61): include('D:\workspace\hu...')
#8 D:\workspace\hustoj\system\classes\kohana\view.php(343): Kohana_View::capture()
#9 D:\workspace\hustoj\system\classes\kohana\view.php(228): Kohana_View->render()
#10 D:\workspace\hustoj\system\classes\kohana\response.php(160): Kohana_View->__toString(Object(View))
#11 D:\workspace\hustoj\application\classes\controller\my.php(14): Kohana_Response->body()
#12 [internal function]: Controller_My->after(Object(Controller_Problem))
#13 D:\workspace\hustoj\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Request))
#14 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#15 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute()
#16 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#17 {main}
2011-09-18 21:51:34 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 21:51:34 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 21:52:23 --- ERROR: ErrorException [ 2 ]: mysql_fetch_object(): supplied argument is not a valid MySQL result resource ~ MODPATH\database\classes\kohana\database\mysql\result.php [ 57 ]
2011-09-18 21:52:23 --- STRACE: ErrorException [ 2 ]: mysql_fetch_object(): supplied argument is not a valid MySQL result resource ~ MODPATH\database\classes\kohana\database\mysql\result.php [ 57 ]
--
#0 [internal function]: Kohana_Core::error_handler(0)
#1 D:\workspace\hustoj\modules\database\classes\kohana\database\mysql\result.php(57): mysql_fetch_object()
#2 D:\workspace\hustoj\application\views\problem\list.php(4): Kohana_Database_MySQL_Result->current('D:\workspace\hu...', Array)
#3 D:\workspace\hustoj\system\classes\kohana\view.php(61): include('D:\workspace\hu...')
#4 D:\workspace\hustoj\system\classes\kohana\view.php(343): Kohana_View::capture()
#5 D:\workspace\hustoj\system\classes\kohana\view.php(228): Kohana_View->render()
#6 D:\workspace\hustoj\application\views\layout.php(13): Kohana_View->__toString('D:\workspace\hu...', Array)
#7 D:\workspace\hustoj\system\classes\kohana\view.php(61): include('D:\workspace\hu...')
#8 D:\workspace\hustoj\system\classes\kohana\view.php(343): Kohana_View::capture()
#9 D:\workspace\hustoj\system\classes\kohana\view.php(228): Kohana_View->render()
#10 D:\workspace\hustoj\system\classes\kohana\response.php(160): Kohana_View->__toString(Object(View))
#11 D:\workspace\hustoj\application\classes\controller\my.php(14): Kohana_Response->body()
#12 [internal function]: Controller_My->after(Object(Controller_Problem))
#13 D:\workspace\hustoj\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Request))
#14 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#15 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute()
#16 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#17 {main}
2011-09-18 21:52:23 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 21:52:23 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 21:52:35 --- ERROR: ErrorException [ 2 ]: mysql_fetch_object(): supplied argument is not a valid MySQL result resource ~ MODPATH\database\classes\kohana\database\mysql\result.php [ 57 ]
2011-09-18 21:52:35 --- STRACE: ErrorException [ 2 ]: mysql_fetch_object(): supplied argument is not a valid MySQL result resource ~ MODPATH\database\classes\kohana\database\mysql\result.php [ 57 ]
--
#0 [internal function]: Kohana_Core::error_handler(0)
#1 D:\workspace\hustoj\modules\database\classes\kohana\database\mysql\result.php(57): mysql_fetch_object()
#2 D:\workspace\hustoj\application\views\problem\list.php(4): Kohana_Database_MySQL_Result->current('D:\workspace\hu...', Array)
#3 D:\workspace\hustoj\system\classes\kohana\view.php(61): include('D:\workspace\hu...')
#4 D:\workspace\hustoj\system\classes\kohana\view.php(343): Kohana_View::capture()
#5 D:\workspace\hustoj\system\classes\kohana\view.php(228): Kohana_View->render()
#6 D:\workspace\hustoj\application\views\layout.php(13): Kohana_View->__toString('D:\workspace\hu...', Array)
#7 D:\workspace\hustoj\system\classes\kohana\view.php(61): include('D:\workspace\hu...')
#8 D:\workspace\hustoj\system\classes\kohana\view.php(343): Kohana_View::capture()
#9 D:\workspace\hustoj\system\classes\kohana\view.php(228): Kohana_View->render()
#10 D:\workspace\hustoj\system\classes\kohana\response.php(160): Kohana_View->__toString(Object(View))
#11 D:\workspace\hustoj\application\classes\controller\my.php(14): Kohana_Response->body()
#12 [internal function]: Controller_My->after(Object(Controller_Problem))
#13 D:\workspace\hustoj\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Request))
#14 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#15 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute()
#16 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#17 {main}
2011-09-18 21:52:35 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 21:52:35 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 21:53:56 --- ERROR: ErrorException [ 2 ]: mysql_fetch_object(): supplied argument is not a valid MySQL result resource ~ MODPATH\database\classes\kohana\database\mysql\result.php [ 57 ]
2011-09-18 21:53:56 --- STRACE: ErrorException [ 2 ]: mysql_fetch_object(): supplied argument is not a valid MySQL result resource ~ MODPATH\database\classes\kohana\database\mysql\result.php [ 57 ]
--
#0 [internal function]: Kohana_Core::error_handler(0)
#1 D:\workspace\hustoj\modules\database\classes\kohana\database\mysql\result.php(57): mysql_fetch_object()
#2 D:\workspace\hustoj\application\views\problem\list.php(4): Kohana_Database_MySQL_Result->current('D:\workspace\hu...', Array)
#3 D:\workspace\hustoj\system\classes\kohana\view.php(61): include('D:\workspace\hu...')
#4 D:\workspace\hustoj\system\classes\kohana\view.php(343): Kohana_View::capture()
#5 D:\workspace\hustoj\system\classes\kohana\view.php(228): Kohana_View->render()
#6 D:\workspace\hustoj\application\views\layout.php(13): Kohana_View->__toString('D:\workspace\hu...', Array)
#7 D:\workspace\hustoj\system\classes\kohana\view.php(61): include('D:\workspace\hu...')
#8 D:\workspace\hustoj\system\classes\kohana\view.php(343): Kohana_View::capture()
#9 D:\workspace\hustoj\system\classes\kohana\view.php(228): Kohana_View->render()
#10 D:\workspace\hustoj\system\classes\kohana\response.php(160): Kohana_View->__toString(Object(View))
#11 D:\workspace\hustoj\application\classes\controller\my.php(14): Kohana_Response->body()
#12 [internal function]: Controller_My->after(Object(Controller_Problem))
#13 D:\workspace\hustoj\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Request))
#14 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#15 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute()
#16 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#17 {main}
2011-09-18 21:53:57 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 21:53:57 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 21:54:09 --- ERROR: ErrorException [ 2 ]: mysql_data_seek(): supplied argument is not a valid MySQL result resource ~ MODPATH\database\classes\kohana\database\mysql\result.php [ 33 ]
2011-09-18 21:54:09 --- STRACE: ErrorException [ 2 ]: mysql_data_seek(): supplied argument is not a valid MySQL result resource ~ MODPATH\database\classes\kohana\database\mysql\result.php [ 33 ]
--
#0 [internal function]: Kohana_Core::error_handler(0, 0)
#1 D:\workspace\hustoj\modules\database\classes\kohana\database\mysql\result.php(33): mysql_data_seek(0)
#2 D:\workspace\hustoj\modules\database\classes\kohana\database\mysql\result.php(48): Kohana_Database_MySQL_Result->seek()
#3 D:\workspace\hustoj\application\views\problem\list.php(4): Kohana_Database_MySQL_Result->current('D:\workspace\hu...', Array)
#4 D:\workspace\hustoj\system\classes\kohana\view.php(61): include('D:\workspace\hu...')
#5 D:\workspace\hustoj\system\classes\kohana\view.php(343): Kohana_View::capture()
#6 D:\workspace\hustoj\system\classes\kohana\view.php(228): Kohana_View->render()
#7 D:\workspace\hustoj\application\views\layout.php(13): Kohana_View->__toString('D:\workspace\hu...', Array)
#8 D:\workspace\hustoj\system\classes\kohana\view.php(61): include('D:\workspace\hu...')
#9 D:\workspace\hustoj\system\classes\kohana\view.php(343): Kohana_View::capture()
#10 D:\workspace\hustoj\system\classes\kohana\view.php(228): Kohana_View->render()
#11 D:\workspace\hustoj\system\classes\kohana\response.php(160): Kohana_View->__toString(Object(View))
#12 D:\workspace\hustoj\application\classes\controller\my.php(14): Kohana_Response->body()
#13 [internal function]: Controller_My->after(Object(Controller_Problem))
#14 D:\workspace\hustoj\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Request))
#15 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#16 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute()
#17 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#18 {main}
2011-09-18 21:54:09 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 21:54:09 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 21:56:12 --- ERROR: ErrorException [ 2 ]: mysql_fetch_object(): supplied argument is not a valid MySQL result resource ~ MODPATH\database\classes\kohana\database\mysql\result.php [ 57 ]
2011-09-18 21:56:12 --- STRACE: ErrorException [ 2 ]: mysql_fetch_object(): supplied argument is not a valid MySQL result resource ~ MODPATH\database\classes\kohana\database\mysql\result.php [ 57 ]
--
#0 [internal function]: Kohana_Core::error_handler(0)
#1 D:\workspace\hustoj\modules\database\classes\kohana\database\mysql\result.php(57): mysql_fetch_object()
#2 D:\workspace\hustoj\application\classes\controller\problem.php(21): Kohana_Database_MySQL_Result->current()
#3 [internal function]: Controller_Problem->action_list(Object(Controller_Problem))
#4 D:\workspace\hustoj\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Request))
#5 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute()
#7 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#8 {main}
2011-09-18 21:56:12 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 21:56:12 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 21:56:21 --- ERROR: ErrorException [ 2 ]: mysql_fetch_object(): supplied argument is not a valid MySQL result resource ~ MODPATH\database\classes\kohana\database\mysql\result.php [ 57 ]
2011-09-18 21:56:21 --- STRACE: ErrorException [ 2 ]: mysql_fetch_object(): supplied argument is not a valid MySQL result resource ~ MODPATH\database\classes\kohana\database\mysql\result.php [ 57 ]
--
#0 [internal function]: Kohana_Core::error_handler(0)
#1 D:\workspace\hustoj\modules\database\classes\kohana\database\mysql\result.php(57): mysql_fetch_object()
#2 D:\workspace\hustoj\application\classes\controller\problem.php(21): Kohana_Database_MySQL_Result->current()
#3 [internal function]: Controller_Problem->action_list(Object(Controller_Problem))
#4 D:\workspace\hustoj\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Request))
#5 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute()
#7 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#8 {main}
2011-09-18 21:56:21 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 21:56:21 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 21:56:25 --- ERROR: ErrorException [ 2 ]: mysql_fetch_object(): supplied argument is not a valid MySQL result resource ~ MODPATH\database\classes\kohana\database\mysql\result.php [ 57 ]
2011-09-18 21:56:25 --- STRACE: ErrorException [ 2 ]: mysql_fetch_object(): supplied argument is not a valid MySQL result resource ~ MODPATH\database\classes\kohana\database\mysql\result.php [ 57 ]
--
#0 [internal function]: Kohana_Core::error_handler(0)
#1 D:\workspace\hustoj\modules\database\classes\kohana\database\mysql\result.php(57): mysql_fetch_object()
#2 D:\workspace\hustoj\application\classes\controller\problem.php(21): Kohana_Database_MySQL_Result->current()
#3 [internal function]: Controller_Problem->action_list(Object(Controller_Problem))
#4 D:\workspace\hustoj\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Request))
#5 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute()
#7 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#8 {main}
2011-09-18 21:56:25 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 21:56:25 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 21:56:25 --- ERROR: ErrorException [ 2 ]: mysql_fetch_object(): supplied argument is not a valid MySQL result resource ~ MODPATH\database\classes\kohana\database\mysql\result.php [ 57 ]
2011-09-18 21:56:25 --- STRACE: ErrorException [ 2 ]: mysql_fetch_object(): supplied argument is not a valid MySQL result resource ~ MODPATH\database\classes\kohana\database\mysql\result.php [ 57 ]
--
#0 [internal function]: Kohana_Core::error_handler(0)
#1 D:\workspace\hustoj\modules\database\classes\kohana\database\mysql\result.php(57): mysql_fetch_object()
#2 D:\workspace\hustoj\application\classes\controller\problem.php(21): Kohana_Database_MySQL_Result->current()
#3 [internal function]: Controller_Problem->action_list(Object(Controller_Problem))
#4 D:\workspace\hustoj\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Request))
#5 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute()
#7 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#8 {main}
2011-09-18 21:56:26 --- ERROR: ErrorException [ 2 ]: mysql_fetch_object(): supplied argument is not a valid MySQL result resource ~ MODPATH\database\classes\kohana\database\mysql\result.php [ 57 ]
2011-09-18 21:56:26 --- STRACE: ErrorException [ 2 ]: mysql_fetch_object(): supplied argument is not a valid MySQL result resource ~ MODPATH\database\classes\kohana\database\mysql\result.php [ 57 ]
--
#0 [internal function]: Kohana_Core::error_handler(0)
#1 D:\workspace\hustoj\modules\database\classes\kohana\database\mysql\result.php(57): mysql_fetch_object()
#2 D:\workspace\hustoj\application\classes\controller\problem.php(21): Kohana_Database_MySQL_Result->current()
#3 [internal function]: Controller_Problem->action_list(Object(Controller_Problem))
#4 D:\workspace\hustoj\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Request))
#5 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute()
#7 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#8 {main}
2011-09-18 21:56:26 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 21:56:26 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 21:56:26 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 21:56:26 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 21:56:26 --- ERROR: ErrorException [ 2 ]: mysql_fetch_object(): supplied argument is not a valid MySQL result resource ~ MODPATH\database\classes\kohana\database\mysql\result.php [ 57 ]
2011-09-18 21:56:26 --- STRACE: ErrorException [ 2 ]: mysql_fetch_object(): supplied argument is not a valid MySQL result resource ~ MODPATH\database\classes\kohana\database\mysql\result.php [ 57 ]
--
#0 [internal function]: Kohana_Core::error_handler(0)
#1 D:\workspace\hustoj\modules\database\classes\kohana\database\mysql\result.php(57): mysql_fetch_object()
#2 D:\workspace\hustoj\application\classes\controller\problem.php(21): Kohana_Database_MySQL_Result->current()
#3 [internal function]: Controller_Problem->action_list(Object(Controller_Problem))
#4 D:\workspace\hustoj\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Request))
#5 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute()
#7 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#8 {main}
2011-09-18 21:56:26 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 21:56:26 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 21:59:18 --- ERROR: ErrorException [ 1 ]: Call to undefined method Database_MySQL_Result::as_object() ~ APPPATH\classes\model\problem.php [ 54 ]
2011-09-18 21:59:18 --- STRACE: ErrorException [ 1 ]: Call to undefined method Database_MySQL_Result::as_object() ~ APPPATH\classes\model\problem.php [ 54 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler(1)
#1 {main}
2011-09-18 21:59:18 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 21:59:18 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 22:00:32 --- ERROR: ErrorException [ 2 ]: mysql_fetch_object(): supplied argument is not a valid MySQL result resource ~ MODPATH\database\classes\kohana\database\mysql\result.php [ 57 ]
2011-09-18 22:00:32 --- STRACE: ErrorException [ 2 ]: mysql_fetch_object(): supplied argument is not a valid MySQL result resource ~ MODPATH\database\classes\kohana\database\mysql\result.php [ 57 ]
--
#0 [internal function]: Kohana_Core::error_handler(0)
#1 D:\workspace\hustoj\modules\database\classes\kohana\database\mysql\result.php(57): mysql_fetch_object()
#2 D:\workspace\hustoj\application\classes\controller\problem.php(21): Kohana_Database_MySQL_Result->current()
#3 [internal function]: Controller_Problem->action_list(Object(Controller_Problem))
#4 D:\workspace\hustoj\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Request))
#5 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute()
#7 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#8 {main}
2011-09-18 22:00:32 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 22:00:32 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 22:00:58 --- ERROR: ErrorException [ 2 ]: mysql_fetch_object(): supplied argument is not a valid MySQL result resource ~ MODPATH\database\classes\kohana\database\mysql\result.php [ 57 ]
2011-09-18 22:00:58 --- STRACE: ErrorException [ 2 ]: mysql_fetch_object(): supplied argument is not a valid MySQL result resource ~ MODPATH\database\classes\kohana\database\mysql\result.php [ 57 ]
--
#0 [internal function]: Kohana_Core::error_handler(0)
#1 D:\workspace\hustoj\modules\database\classes\kohana\database\mysql\result.php(57): mysql_fetch_object()
#2 D:\workspace\hustoj\application\classes\controller\problem.php(21): Kohana_Database_MySQL_Result->current()
#3 [internal function]: Controller_Problem->action_list(Object(Controller_Problem))
#4 D:\workspace\hustoj\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Request))
#5 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute()
#7 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#8 {main}
2011-09-18 22:00:58 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 22:00:58 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 22:01:12 --- ERROR: ErrorException [ 2 ]: mysql_fetch_object(): supplied argument is not a valid MySQL result resource ~ MODPATH\database\classes\kohana\database\mysql\result.php [ 57 ]
2011-09-18 22:01:12 --- STRACE: ErrorException [ 2 ]: mysql_fetch_object(): supplied argument is not a valid MySQL result resource ~ MODPATH\database\classes\kohana\database\mysql\result.php [ 57 ]
--
#0 [internal function]: Kohana_Core::error_handler(0)
#1 D:\workspace\hustoj\modules\database\classes\kohana\database\mysql\result.php(57): mysql_fetch_object()
#2 D:\workspace\hustoj\application\classes\controller\problem.php(21): Kohana_Database_MySQL_Result->current()
#3 [internal function]: Controller_Problem->action_list(Object(Controller_Problem))
#4 D:\workspace\hustoj\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Request))
#5 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute()
#7 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#8 {main}
2011-09-18 22:01:12 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 22:01:12 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 22:03:50 --- ERROR: ErrorException [ 2 ]: mysql_fetch_object(): supplied argument is not a valid MySQL result resource ~ MODPATH\database\classes\kohana\database\mysql\result.php [ 57 ]
2011-09-18 22:03:50 --- STRACE: ErrorException [ 2 ]: mysql_fetch_object(): supplied argument is not a valid MySQL result resource ~ MODPATH\database\classes\kohana\database\mysql\result.php [ 57 ]
--
#0 [internal function]: Kohana_Core::error_handler(0)
#1 D:\workspace\hustoj\modules\database\classes\kohana\database\mysql\result.php(57): mysql_fetch_object()
#2 D:\workspace\hustoj\application\classes\controller\problem.php(21): Kohana_Database_MySQL_Result->current()
#3 [internal function]: Controller_Problem->action_list(Object(Controller_Problem))
#4 D:\workspace\hustoj\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Request))
#5 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute()
#7 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#8 {main}
2011-09-18 22:03:50 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 22:03:50 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 22:36:45 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 22:36:45 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 22:36:48 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 22:36:48 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 22:37:02 --- ERROR: ErrorException [ 2 ]: mysql_fetch_object(): supplied argument is not a valid MySQL result resource ~ MODPATH\database\classes\kohana\database\mysql\result.php [ 57 ]
2011-09-18 22:37:02 --- STRACE: ErrorException [ 2 ]: mysql_fetch_object(): supplied argument is not a valid MySQL result resource ~ MODPATH\database\classes\kohana\database\mysql\result.php [ 57 ]
--
#0 [internal function]: Kohana_Core::error_handler(0)
#1 D:\workspace\hustoj\modules\database\classes\kohana\database\mysql\result.php(57): mysql_fetch_object()
#2 D:\workspace\hustoj\application\classes\controller\problem.php(23): Kohana_Database_MySQL_Result->current()
#3 [internal function]: Controller_Problem->action_list(Object(Controller_Problem))
#4 D:\workspace\hustoj\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Request))
#5 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute()
#7 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#8 {main}
2011-09-18 22:37:02 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 22:37:02 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 22:39:32 --- ERROR: ErrorException [ 2 ]: mysql_fetch_object(): supplied argument is not a valid MySQL result resource ~ MODPATH\database\classes\kohana\database\mysql\result.php [ 57 ]
2011-09-18 22:39:32 --- STRACE: ErrorException [ 2 ]: mysql_fetch_object(): supplied argument is not a valid MySQL result resource ~ MODPATH\database\classes\kohana\database\mysql\result.php [ 57 ]
--
#0 [internal function]: Kohana_Core::error_handler(0)
#1 D:\workspace\hustoj\modules\database\classes\kohana\database\mysql\result.php(57): mysql_fetch_object()
#2 D:\workspace\hustoj\application\classes\controller\problem.php(23): Kohana_Database_MySQL_Result->current()
#3 [internal function]: Controller_Problem->action_list(Object(Controller_Problem))
#4 D:\workspace\hustoj\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Request))
#5 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute()
#7 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#8 {main}
2011-09-18 22:39:32 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 22:39:32 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 22:40:29 --- ERROR: ErrorException [ 8 ]: Undefined variable: problems ~ APPPATH\views\problem\list.php [ 4 ]
2011-09-18 22:40:29 --- STRACE: ErrorException [ 8 ]: Undefined variable: problems ~ APPPATH\views\problem\list.php [ 4 ]
--
#0 D:\workspace\hustoj\application\views\problem\list.php(4): Kohana_Core::error_handler('D:\workspace\hu...', Array)
#1 D:\workspace\hustoj\system\classes\kohana\view.php(61): include('D:\workspace\hu...')
#2 D:\workspace\hustoj\system\classes\kohana\view.php(343): Kohana_View::capture()
#3 D:\workspace\hustoj\system\classes\kohana\view.php(228): Kohana_View->render()
#4 D:\workspace\hustoj\application\views\layout.php(13): Kohana_View->__toString('D:\workspace\hu...', Array)
#5 D:\workspace\hustoj\system\classes\kohana\view.php(61): include('D:\workspace\hu...')
#6 D:\workspace\hustoj\system\classes\kohana\view.php(343): Kohana_View::capture()
#7 D:\workspace\hustoj\system\classes\kohana\view.php(228): Kohana_View->render()
#8 D:\workspace\hustoj\system\classes\kohana\response.php(160): Kohana_View->__toString(Object(View))
#9 D:\workspace\hustoj\application\classes\controller\my.php(14): Kohana_Response->body()
#10 [internal function]: Controller_My->after(Object(Controller_Problem))
#11 D:\workspace\hustoj\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Request))
#12 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#13 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute()
#14 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#15 {main}
2011-09-18 22:40:29 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 22:40:29 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 22:49:22 --- ERROR: ErrorException [ 1 ]: Call to undefined method Model_Problem::get_one_page() ~ APPPATH\classes\controller\problem.php [ 15 ]
2011-09-18 22:49:22 --- STRACE: ErrorException [ 1 ]: Call to undefined method Model_Problem::get_one_page() ~ APPPATH\classes\controller\problem.php [ 15 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2011-09-18 22:49:22 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 22:49:22 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 22:49:33 --- ERROR: ErrorException [ 1 ]: Call to undefined method Model_Problem::get_one_page() ~ APPPATH\classes\controller\problem.php [ 15 ]
2011-09-18 22:49:33 --- STRACE: ErrorException [ 1 ]: Call to undefined method Model_Problem::get_one_page() ~ APPPATH\classes\controller\problem.php [ 15 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2011-09-18 22:49:33 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 22:49:33 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 22:49:45 --- ERROR: ErrorException [ 8 ]: Undefined variable: problems ~ APPPATH\views\problem\list.php [ 4 ]
2011-09-18 22:49:45 --- STRACE: ErrorException [ 8 ]: Undefined variable: problems ~ APPPATH\views\problem\list.php [ 4 ]
--
#0 D:\workspace\hustoj\application\views\problem\list.php(4): Kohana_Core::error_handler('D:\workspace\hu...', Array)
#1 D:\workspace\hustoj\system\classes\kohana\view.php(61): include('D:\workspace\hu...')
#2 D:\workspace\hustoj\system\classes\kohana\view.php(343): Kohana_View::capture()
#3 D:\workspace\hustoj\system\classes\kohana\view.php(228): Kohana_View->render()
#4 D:\workspace\hustoj\application\views\layout.php(13): Kohana_View->__toString('D:\workspace\hu...', Array)
#5 D:\workspace\hustoj\system\classes\kohana\view.php(61): include('D:\workspace\hu...')
#6 D:\workspace\hustoj\system\classes\kohana\view.php(343): Kohana_View::capture()
#7 D:\workspace\hustoj\system\classes\kohana\view.php(228): Kohana_View->render()
#8 D:\workspace\hustoj\system\classes\kohana\response.php(160): Kohana_View->__toString(Object(View))
#9 D:\workspace\hustoj\application\classes\controller\my.php(14): Kohana_Response->body()
#10 [internal function]: Controller_My->after(Object(Controller_Problem))
#11 D:\workspace\hustoj\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Request))
#12 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#13 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute()
#14 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#15 {main}
2011-09-18 22:49:46 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 22:49:46 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 22:50:02 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 22:50:02 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 22:50:11 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL about was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2011-09-18 22:50:11 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL about was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#3 {main}
2011-09-18 22:50:11 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 22:50:11 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 22:50:13 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 22:50:13 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 22:56:27 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 22:56:27 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 22:56:42 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 22:56:42 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 22:57:48 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL problem/1071 was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 113 ]
2011-09-18 22:57:48 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL problem/1071 was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 113 ]
--
#0 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#3 {main}
2011-09-18 22:57:48 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 22:57:48 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 22:59:45 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 22:59:45 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 22:59:48 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/list/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 22:59:48 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/list/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 22:59:53 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/list/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 22:59:53 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/list/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 22:59:57 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/list/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 22:59:57 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/list/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 23:00:00 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/list/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 23:00:00 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/list/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 23:04:15 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL problem/1044 was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 113 ]
2011-09-18 23:04:15 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL problem/1044 was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 113 ]
--
#0 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#3 {main}
2011-09-18 23:04:16 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 23:04:16 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 23:04:52 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL problem/1044 was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 113 ]
2011-09-18 23:04:52 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL problem/1044 was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 113 ]
--
#0 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#3 {main}
2011-09-18 23:04:52 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 23:04:52 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 23:16:20 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL problem/1044 was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 113 ]
2011-09-18 23:16:20 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL problem/1044 was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 113 ]
--
#0 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#3 {main}
2011-09-18 23:16:20 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 23:16:20 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 23:16:25 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/list/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 23:16:25 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/list/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 23:16:27 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/list/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 23:16:27 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/list/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 23:16:28 --- ERROR: ErrorException [ 8 ]: Undefined variable: body ~ APPPATH\views\layout.php [ 13 ]
2011-09-18 23:16:28 --- STRACE: ErrorException [ 8 ]: Undefined variable: body ~ APPPATH\views\layout.php [ 13 ]
--
#0 D:\workspace\hustoj\application\views\layout.php(13): Kohana_Core::error_handler('D:\workspace\hu...', Array)
#1 D:\workspace\hustoj\system\classes\kohana\view.php(61): include('D:\workspace\hu...')
#2 D:\workspace\hustoj\system\classes\kohana\view.php(343): Kohana_View::capture()
#3 D:\workspace\hustoj\system\classes\kohana\view.php(228): Kohana_View->render()
#4 D:\workspace\hustoj\system\classes\kohana\response.php(160): Kohana_View->__toString(Object(View))
#5 D:\workspace\hustoj\application\classes\controller\my.php(14): Kohana_Response->body()
#6 [internal function]: Controller_My->after(Object(Controller_Problem))
#7 D:\workspace\hustoj\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Request))
#8 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#9 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute()
#10 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#11 {main}
2011-09-18 23:16:29 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 23:16:29 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 23:21:55 --- ERROR: ErrorException [ 1 ]: Call to undefined method View::facetory() ~ APPPATH\classes\controller\problem.php [ 36 ]
2011-09-18 23:21:55 --- STRACE: ErrorException [ 1 ]: Call to undefined method View::facetory() ~ APPPATH\classes\controller\problem.php [ 36 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2011-09-18 23:21:56 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 23:21:56 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 23:22:04 --- ERROR: ErrorException [ 2 ]: Missing argument 3 for Kohana_Database_Query_Builder_Where::where(), called in D:\workspace\hustoj\application\classes\model\problem.php on line 20 and defined ~ MODPATH\database\classes\kohana\database\query\builder\where.php [ 30 ]
2011-09-18 23:22:04 --- STRACE: ErrorException [ 2 ]: Missing argument 3 for Kohana_Database_Query_Builder_Where::where(), called in D:\workspace\hustoj\application\classes\model\problem.php on line 20 and defined ~ MODPATH\database\classes\kohana\database\query\builder\where.php [ 30 ]
--
#0 D:\workspace\hustoj\modules\database\classes\kohana\database\query\builder\where.php(30): Kohana_Core::error_handler('problem_id', '1007')
#1 D:\workspace\hustoj\application\classes\model\problem.php(20): Kohana_Database_Query_Builder_Where->where('1007')
#2 D:\workspace\hustoj\application\classes\controller\problem.php(37): Model_Problem->get_problem()
#3 [internal function]: Controller_Problem->action_show(Object(Controller_Problem))
#4 D:\workspace\hustoj\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Request))
#5 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute()
#7 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#8 {main}
2011-09-18 23:22:04 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 23:22:04 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 23:23:14 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/list/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 23:23:14 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/list/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 23:23:15 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/list/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 23:23:15 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/list/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 23:23:17 --- ERROR: ErrorException [ 2 ]: Missing argument 3 for Kohana_Database_Query_Builder_Where::where(), called in D:\workspace\hustoj\application\classes\model\problem.php on line 20 and defined ~ MODPATH\database\classes\kohana\database\query\builder\where.php [ 30 ]
2011-09-18 23:23:17 --- STRACE: ErrorException [ 2 ]: Missing argument 3 for Kohana_Database_Query_Builder_Where::where(), called in D:\workspace\hustoj\application\classes\model\problem.php on line 20 and defined ~ MODPATH\database\classes\kohana\database\query\builder\where.php [ 30 ]
--
#0 D:\workspace\hustoj\modules\database\classes\kohana\database\query\builder\where.php(30): Kohana_Core::error_handler('problem_id', '1008')
#1 D:\workspace\hustoj\application\classes\model\problem.php(20): Kohana_Database_Query_Builder_Where->where('1008')
#2 D:\workspace\hustoj\application\classes\controller\problem.php(37): Model_Problem->get_problem()
#3 [internal function]: Controller_Problem->action_show(Object(Controller_Problem))
#4 D:\workspace\hustoj\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Request))
#5 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute()
#7 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#8 {main}
2011-09-18 23:23:17 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 23:23:17 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 23:23:20 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/list/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 23:23:20 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/list/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 23:23:22 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/list/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 23:23:22 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/list/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 23:32:01 --- ERROR: ErrorException [ 2 ]: Missing argument 3 for Kohana_Database_Query_Builder_Where::where(), called in D:\workspace\hustoj\application\classes\model\problem.php on line 20 and defined ~ MODPATH\database\classes\kohana\database\query\builder\where.php [ 30 ]
2011-09-18 23:32:01 --- STRACE: ErrorException [ 2 ]: Missing argument 3 for Kohana_Database_Query_Builder_Where::where(), called in D:\workspace\hustoj\application\classes\model\problem.php on line 20 and defined ~ MODPATH\database\classes\kohana\database\query\builder\where.php [ 30 ]
--
#0 D:\workspace\hustoj\modules\database\classes\kohana\database\query\builder\where.php(30): Kohana_Core::error_handler('problem_id', '1009')
#1 D:\workspace\hustoj\application\classes\model\problem.php(20): Kohana_Database_Query_Builder_Where->where('1009')
#2 D:\workspace\hustoj\application\classes\controller\problem.php(37): Model_Problem->get_problem()
#3 [internal function]: Controller_Problem->action_show(Object(Controller_Problem))
#4 D:\workspace\hustoj\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Request))
#5 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute()
#7 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#8 {main}
2011-09-18 23:32:01 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 23:32:01 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 23:32:28 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/show/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 23:32:28 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/show/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 23:32:32 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 23:32:32 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 23:37:12 --- ERROR: ErrorException [ 8 ]: Undefined property: stdClass::$sample_Output ~ APPPATH\views\problem\show.php [ 12 ]
2011-09-18 23:37:12 --- STRACE: ErrorException [ 8 ]: Undefined property: stdClass::$sample_Output ~ APPPATH\views\problem\show.php [ 12 ]
--
#0 D:\workspace\hustoj\application\views\problem\show.php(12): Kohana_Core::error_handler('D:\workspace\hu...', Array)
#1 D:\workspace\hustoj\system\classes\kohana\view.php(61): include('D:\workspace\hu...')
#2 D:\workspace\hustoj\system\classes\kohana\view.php(343): Kohana_View::capture()
#3 D:\workspace\hustoj\system\classes\kohana\view.php(228): Kohana_View->render()
#4 D:\workspace\hustoj\application\views\layout.php(13): Kohana_View->__toString('D:\workspace\hu...', Array)
#5 D:\workspace\hustoj\system\classes\kohana\view.php(61): include('D:\workspace\hu...')
#6 D:\workspace\hustoj\system\classes\kohana\view.php(343): Kohana_View::capture()
#7 D:\workspace\hustoj\system\classes\kohana\view.php(228): Kohana_View->render()
#8 D:\workspace\hustoj\system\classes\kohana\response.php(160): Kohana_View->__toString(Object(View))
#9 D:\workspace\hustoj\application\classes\controller\my.php(14): Kohana_Response->body()
#10 [internal function]: Controller_My->after(Object(Controller_Problem))
#11 D:\workspace\hustoj\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Request))
#12 D:\workspace\hustoj\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#13 D:\workspace\hustoj\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute()
#14 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#15 {main}
2011-09-18 23:37:12 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/show/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 23:37:12 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/show/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 23:37:17 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/show/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 23:37:17 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/show/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 23:38:42 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/show/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 23:38:42 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/show/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 23:40:46 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/show/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 23:40:46 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/show/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}
2011-09-18 23:44:01 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/show/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-09-18 23:44:01 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: problem/show/favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\workspace\hustoj\index.php(109): Kohana_Request->execute()
#1 {main}