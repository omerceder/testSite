<?php

class ProductBoxGenerator
{
    /**
     * Generates the highlighted comment HTML for the given comment.
     *
     * @param int $product_id
     * @param string $box_color
     *
     * @return string
     */
    public function generate($product_id, $box_color = '')
    {
      ob_start();

      include __DIR__ . '/box-templates/box-template.php';

      return ob_get_clean();
    }
}
