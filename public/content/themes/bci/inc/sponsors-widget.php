<?php

class Sponsor_Logos_Widget extends WP_Widget {

  function Sponsor_Logos_Widget() {
    parent::__construct( false, 'Sponsor Logos' );
  }

  function widget($args, $instance) {

    var_dump( $instance );

    echo '<div class="sponsors-widget">';

    echo 'sponsors FPO'; // XXX

    // foreach ( $instance as $key => $value ) :
    //   $logoColor = get_field('logo_color');
    //   $logoGrayscale = get_field('logo_grayscale');
    //   $classes = array('sponsor-logo', 'sponsor-logo-'.$post->post_name);

    //   echo '<a class="'.implode(' ', $classes).'" href="'.get_the_permalink().'">';
    //   echo '<span style="background-image:url('.$logoColor['url'].')" class="logo logo-color"></span>';
    //   echo '<span style="background-image:url('.$logoGrayscale['url'].')" class="logo logo-grayscale"></span>';
    //   echo '</a>';
    // endforeach;

    echo '</div>';

  }

  function update($new_instance, $old_instance) {
    return $new_instance;
  }

  function form($instance) {
    $markup = '';

    for ( $i = 1; $i <= 4; $i++ ) {
      $markup .= '<div>';
      $markup .= "<label>Logo</label><input type=\"file\" name=\"logo_$i\" value=\"{$instance["logo_$i"]}\"><br>";
      $markup .= "<label>URL</label><input type=\"text\" name=\"url_$i\" value=\"{$instance["url_$i"]}\"><br>";
      $markup .= "<label>Order</label><input type=\"text\" name=\"order_$i\" size=\"2\" value=\"{$instance["order_$i"]}\">";
      $markup .= "<hr>";
      $markup .= "</div>\n";
    }
    // foreach ($instance as $key=>$service) {

    //   $url_name = $this->get_field_name($key);
    //   if (isset($instance[$key])) {
    //     $url_value = esc_attr($instance[$key]);
    //   } else {
    //     $url_value = '';
    //   }

    //   $order_name = $this->get_field_name('order_'.$key);
    //   if (isset($instance['order_'.$key])) {
    //     $order_value = esc_attr($instance['order_'.$key]);
    //   } else {
    //     $order_value = '0';
    //   }

    //   $markup .= '<tr>';
    //   $markup .= "<td>{$service['label']}</td>";
    //   $markup .= "<td><input type=\"text\" name=\"$url_name\" value=\"$url_value\"></td>";
    //   $markup .= "<td><input type=\"text\" name=\"$order_name\" value=\"$order_value\" size=\"2\"></td>";
    //   $markup .= "</tr>\n";
    // }


    $markup .= '</table>';
    echo $markup;
  }

}
