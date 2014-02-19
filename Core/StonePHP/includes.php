<?php

// LIBRARIES
require_once 'LibLoader'.DS.'whoops.php';

// EXCEPTIONS
require_once 'Exceptions'.DS.'UndifinedActionException.php';
require_once 'Exceptions'.DS.'UndifinedControllerException.php';
require_once 'Exceptions'.DS.'UndifinedIndexException.php';
require_once 'Exceptions'.DS.'UndifinedModelException.php';

// DEBUG FUNCTION
require_once 'Support'.DS.'debug.php';

// SUPPORT
require_once 'Support'.DS.'File.php';
require_once 'Support'.DS.'Server.php';

// ROUTING
require_once 'Routing'.DS.'Request.php';
require_once 'Routing'.DS.'Router.php';

// DATABASE
require_once 'Database'.DS.'Model.php';

// CONTROLLER
require_once 'Controller'.DS.'Controller.php';
require_once 'Controller'.DS.'View.php';

// CONFIGURATION
require_once CONFIG.DS.'Config.php';

// MAIN APP
require_once CONTROLLER.DS.'AppController.php';
require_once MODEL.DS.'AppModel.php';

// MAIN APPLICATION CLASS
require_once 'Application.php';