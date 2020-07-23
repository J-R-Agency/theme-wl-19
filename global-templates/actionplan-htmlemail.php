<?php

if( isset($wl_goal) ){

    // Parse steps and format HTML

    unset($wl_steps);

    if ( isset($wl_step_one) ) {
        $wl_steps[] = $wl_step_one;
    }
    if ( isset($wl_step_two) ) {
        $wl_steps[] = $wl_step_two;
    }
    if ( isset($wl_step_three) ) {
        $wl_steps[] = $wl_step_three;
    }
    if ( isset($wl_step_four) ) {
        $wl_steps[] = $wl_step_four;
    }
    if ( isset($wl_step_five) ) {
        $wl_steps[] = $wl_step_five;
    }

    if ( isset($wl_steps) ){
        $display_wl_steps = "<ul>\r\n<li>" . implode("</li>\r\n<li>", $wl_steps ) . "</li>\r\n</ul>\r\n";
    }


    // Parse activities shortlist
    if ( isset($_COOKIE['simplefavorites']) ){

        $wl_simplefavorites = json_decode(stripslashes($_COOKIE['simplefavorites']), true);

        if ( is_array( $wl_simplefavorites ) ){

            if ( isset($wl_simplefavorites[0]["posts"]) ){

                $wl_shortlist = $wl_simplefavorites[0]["posts"] ;



                // GET WP DATA FROM POST IDs

                    $args = array(
                        'post_type' => 'activities',
                        'post__in' => $wl_shortlist ,
                    );
                                            

                    $shortlist_posts = new WP_Query($args);

                    if($shortlist_posts->have_posts()) : 
                      while($shortlist_posts->have_posts()) : 
                         $shortlist_posts->the_post();

                         $display_wl_shortlist .=  "<li><a href=\"" . get_the_permalink() . "\" title=\"View " . get_the_title()  . " on the Wellbeing Liverpool site\">" . get_the_title() . "</a></li>\r\n";

                        endwhile;
                    else: 

                        if ( !isset($_COOKIE['wl_goal']) ) {
                            echo $msg_no_activities_b ;
                        } else {
                            echo $msg_no_activities_a ;
                        }

                    endif;

                    wp_reset_postdata();

                    if( $display_wl_shortlist != "" ){
                        $display_wl_shortlist = "<ul>" . $display_wl_shortlist . "</ul>" ;
                    }



                        $body_actionplan = "
                <div>
                <h1>Action Plan</h1>
                <div>$your_name</div>
                <div>$your_email</div>
                <h2>Goal</h2>
                <div>$wl_goal</div>
                <h2>Steps</h2>
                <div>
                $display_wl_steps
                </div>
                <h2>Activities</h2>
                <div>
                $display_wl_shortlist
                </div>
                <h2>Notes</h2>
                <div>
                $wl_notes
                </div>
                </div>
                        ";

                        // echo $body_actionplan ;




            }

        }

    }

} else {


}



?>