<?php

class Social_Links_Widget extends WP_Widget {

  public $services = array(
    'facebook'=>array(
      'label'=>'Facebook',
      'class'=>'fa fa-facebook-square',
    ),
    'twitter'=>array(
      'label'=>'Twitter',
      'class'=>'fa fa-twitter',
    ),
    'instagram'=>array(
      'label'=>'Instagram',
      'class'=>'fa fa-instagram',
    ),
    'google_plus'=>array(
      'label'=>'Google+',
      'class'=>'fa fa-google-plus-square',
    ),
    'pinterest'=>array(
      'label'=>'Pinterest',
      'class'=>'fa fa-instagram',
    ),
  );

  function Social_Links_Widget() {
    parent::__construct( false, 'Social Links' );
  }

  function widget($args, $instance) {
    $markup = '<div class="social-links-widget">';
    $links = array();
    foreach ($this->services as $key=>$service) {
      if (isset($instance[$key]) && $instance[$key]) {
        $links[] = array(
          'url'=>$instance[$key],
          'service'=>$key,
          'serviceName'=>$service['label'],
          'serviceClass'=>$service['class'],
          'order'=>$instance["order_$key"],
        );
      }
    }
    usort($links, array('Social_Links_Widget', 'sortLinks'));
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
