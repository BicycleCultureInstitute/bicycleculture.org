<?php

class Sponsor_Logos_Widget extends WP_Widget {

  function Sponsor_Logos_Widget() {
    parent::__construct( false, 'Sponsor Logos' );
  }

  function widget($args, $instance) {
    $markup = '<div class="sponsor-logos-widget">';
    var_dump( $instance ); // XXX
    $links = array();
    foreach ($links as $link) {
      $markup .= "<a href=\"{$link['url']}\" class=\"{$link['serviceClass']}\" target=\"{$link['service']}\" title=\"{$link['serviceName']}\"></a>\n";
    }
    $markup .= '</div>';
    echo $markup;
  }

  function update($new_instance, $old_instance) {
    return $new_instance;
  }

  function form($instance) {
    $markup = '<table>';
    $markup .= '<tr>';
    $markup .= '<th>Service</th>';
    $markup .= '<th>URL</th>';
    $markup .= '<th>Order</th>';
    $markup .= '</tr>';

    foreach ($this->services as $key=>$service) {

      $url_name = $this->get_field_name($key);
      if (isset($instance[$key])) {
        $url_value = esc_attr($instance[$key]);
      } else {
        $url_value = '';
      }

      $order_name = $this->get_field_name('order_'.$key);
      if (isset($instance['order_'.$key])) {
        $order_value = esc_attr($instance['order_'.$key]);
      } else {
        $order_value = '0';
      }

      $markup .= '<tr>';
      $markup .= "<td>{$service['label']}</td>";
      $markup .= "<td><input type=\"text\" name=\"$url_name\" value=\"$url_value\"></td>";
      $markup .= "<td><input type=\"text\" name=\"$order_name\" value=\"$order_value\" size=\"2\"></td>";
      $markup .= "</tr>\n";
    }
    $markup .= '</table>';
    echo $markup;
  }

  function sortLinks($a, $b) {
    if ($a['order'] > $b['order'])
      return 1;
    else if ($a['order'] < $b['order'])
      return -1;
    else
      return 0;
  }

}
