<?php
/*
Plugin Name: Geo Redirects Contour Design
Description: Redirect customers to the correct web page based on country code.
Author: Angel Alpuche
*/

function hook_javascript() {

?>
<script>
 jQuery(function(){
   
    jQuery.getJSON('https://freegeoip.app/json/', function(response) {

        var current_url = window.location.origin + window.location.pathname;

        if (current_url == 'https://www.contourdesign.com/support/' || 
            current_url == 'https://www.contourdesign.com/support' || 
            current_url == 'https://support.contourdesign.com/' || 
            current_url == 'https://support.contourdesign.com') 
            {
                console.log('Support statement called');
                switch(response.country_code) {
                    case 'DK':
                        window.location.assign('http://www.contourdesign.dk/support/' + window.location.search);
                        window.location.replace('http://www.contourdesign.dk/support/' + window.location.search);
                        break;
                    case 'SE':
                        window.location.assign('http://www.contourdesign.se/support/' + window.location.search);
                        window.location.replace('http://www.contourdesign.se/support/' + window.location.search);
                        break;
                    case 'NO':
                        window.location.assign('http://www.contourdesign.no/support/' + window.location.search);
                        window.location.replace('http://www.contourdesign.no/support/' + window.location.search);
                        break;
                    case 'FI':
                        window.location.assign('http://www.contourdesign.fi/tuki/' + window.location.search);
                        window.location.replace('http://www.contourdesign.fi/tuki/' + window.location.search);
                        break;
                    case 'FR':
                        window.location.assign('http://www.contourdesign.fr/support/' + window.location.search);
                        window.location.replace('http://www.contourdesign.fr/support/' + window.location.search);
                        break;
                    case 'DE':
                        window.location.assign('http://www.contourdesign.de/support/' + window.location.search);
                        window.location.replace('http://www.contourdesign.de/support/' + window.location.search);
                        break;
                    case 'NL':
                        window.location.assign('http://www.contourdesign.nl/support/' + window.location.search);
                        window.location.replace('http://www.contourdesign.nl/support/' + window.location.search);
                        break;
                    case 'UK':
                        window.location.assign('http://www.contour-design.co.uk/support/' + window.location.search);
                        window.location.replace('http://www.contour-design.co.uk/support/' + window.location.search);
                        break;
                    case 'GB':
                        window.location.assign('http://www.contour-design.co.uk/support/' + window.location.search);
                        window.location.replace('http://www.contour-design.co.uk/support/' + window.location.search);
                        break;
                    case 'MK':
                        window.location.assign('http://www.contour-design.co.uk/support/' + window.location.search + '&mkredirect=true');
                        window.location.replace('http://www.contour-design.co.uk/support/' + window.location.search + '&mkredirect=true');
                        break;
                }
        } 
        else if(current_url == 'https://www.contourdesign.com' || current_url == 'https://www.contourdesign.com/')
            {
                console.log('Home Page statement called');
                switch(response.country_code) 
                {
                    case 'DK':
                        console.log('danish 2');
                        window.location.assign('http://www.contourdesign.dk/' + window.location.search);
                        window.location.replace('http://www.contourdesign.dk/' + window.location.search);
                        break;
                    case 'SE':
                        window.location.assign('http://www.contourdesign.se/' + window.location.search);
                        window.location.replace('http://www.contourdesign.se/' + window.location.search);
                        break;
                    case 'NO':
                        window.location.assign('http://www.contourdesign.no/' + window.location.search);
                        window.location.replace('http://www.contourdesign.no/' + window.location.search);
                        break;
                    case 'FI':
                        window.location.assign('http://www.contourdesign.fi/' + window.location.search);
                        window.location.replace('http://www.contourdesign.fi/' + window.location.search);
                        break;
                    case 'FR':
                        window.location.assign('http://www.contourdesign.fr/' + window.location.search);
                        window.location.replace('http://www.contourdesign.fr/' + window.location.search);
                        break;
                    case 'DE':
                        window.location.assign('http://www.contourdesign.de/' + window.location.search);
                        window.location.replace('http://www.contourdesign.de/' + window.location.search);
                        break;
                    case 'NL':
                        window.location.assign('http://www.contourdesign.nl/' + window.location.search);
                        window.location.replace('http://www.contourdesign.nl/' + window.location.search);
                        break;
                    case 'UK':
                        window.location.assign('http://www.contour-design.co.uk/' + window.location.search);
                        window.location.replace('http:/www.contour-design.co.uk/' + window.location.search);
                        break;
                    case 'GB':
                        window.location.assign('http://www.contour-design.co.uk/' + window.location.search);
                        window.location.replace('http:/www.contour-design.co.uk/' + window.location.search);
                        break;
                    case 'MK':
                        window.location.assign('http://www.contour-design.co.uk/' + window.location.search + '&mkredirect=true');
                        window.location.replace('http://www.contour-design.co.uk/' + window.location.search + '&mkredirect=true');
                        break;    
            }

        }
    });

});
</script>
<?php
}
add_action('wp_footer', 'hook_javascript', 999);

function my_page_template_redirect(){
    global $wp;
    $current_url = home_url(add_query_arg(array(),$wp->request));

    if( is_page(15150) ){
        header("Location: http://www.contourdesign.fr/");
        exit();
    }
    if( is_page(15152) ){
        header("Location: http://www.contourdesign.no/");
        exit();
    }
    if( is_page(15154) ){
        header("Location: http://www.contourdesign.de/");
        exit();
    }
    if( is_page(15158) ){
        header("Location: http://www.contourdesign.nl/");
        exit();
    }
}
add_action( 'template_redirect', 'my_page_template_redirect' );
?>