<?php
/**
 * @copyright	Copyright (C)2011 Edwin Salvador
 * @license		GPL
 */
defined('_JEXEC') or die;
$app = JFactory::getApplication();
$active = $app->getMenu()->getActive();

$u =& JURI::getInstance( JURI::base() );
$host = $u->getHost();
//$user =& JFactory::getUser();
//$user_id =& $user->get('id');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
    <head>

        <jdoc:include type="head" />

        <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/blueprint/reset.css" type="text/css" media="screen, projection" />
        <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/blueprint/grid.css" type="text/css" media="screen, projection" />
        <!--[if IE]><link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/blueprint/ie.css" type="text/css" media="screen, projection" /><![endif]-->

        <!-- ScrollPane -->
        <link rel="stylesheet" type="text/css" media="all" href="templates/<?php echo $this->template ?>/js/jscrollpane/jquery.jscrollpane.css" />
        <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/jscrollpane/jquery.mousewheel.js"></script>
        <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/jscrollpane/mwheelIntent.js"></script>
        <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/jscrollpane/jquery.jscrollpane.min.js"></script>
        
        <!-- Accordeon -->
        

        <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/system.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/general.css" type="text/css" />

        <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/template.css" type="text/css" />
<?php
    $doc = & JFactory::getDocument();
    $doc->addScript( $this->baseurl . "/templates/" . $this->template . "/js/jquery.js" );
    
    $js = "
    /* <![CDATA[ */
    
    jQuery.noConflict();
    jQuery(document).ready(function(){
        jQuery('ul.menu ul').hide();
        jQuery('ul.menu li span').click( function() 
        {
                var checkElement = jQuery(this).next();
                var ul_parent = this.parentNode.parentNode.id;
//                if(jQuery('#' + ul_parent).hasClass('noaccordion')) {
//                    jQuery(this).next().slideToggle('normal');
//                    return false;
//                }
                if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
                    //if(jQuery('#' + ul_parent).hasClass('collapsible')) {
                        jQuery('#' + ul_parent + ' ul:visible').slideUp('normal')
                        jQuery( this ).parent( 'li.active' ).removeClass( 'active' )
                    //}
                    return false;
                }
                if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
                    jQuery('#' + ul_parent + ' ul:visible').slideUp( 'normal' );
                    jQuery('#' + ul_parent + ' li.active').removeClass( 'active' );
                    checkElement.slideDown( 'normal' )
                    jQuery( this ).parent( 'li' ).addClass( 'active' );
                    return false;
                }
        });
        
        jQuery( 'li.active' ).children('ul').slideDown('normal');
        
        //Ocultar mensajes
        jQuery( 'dl#system-message' ).animate( {opacity: 0 }, 15000 ).animate( { height:0 }, function(){
            jQuery( 'dl#system-message' ).remove();
        } );
    });
    
//Mootools
    window.addEvent('domready', function() {   
    
    });    
    /* ]]> */
    " ;
    $doc->addScriptDeclaration( $js );
?>
    </head>
    <body>
        <div class="container showgrid">
            <div id="contenedor-menu" class="span-8">
                <jdoc:include type="modules" name="menu" />
            </div>
            <div id="contenedor-componente" class="span-16 last">
                <div id="componente">
                    <jdoc:include type="component" />
                </div>
            </div>
        </div>
    </body>
</html>
