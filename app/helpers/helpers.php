<?php
function filterByUrl($link, $key, $value = '')
{
   $data = request()->all();
   $data[$key] = $value;
   $queryFilter = '';
   $count = 0;
   foreach ($data as $index => $item) {
      $queryFilter .= ($count == 0 ? '?' : '&') . $index . '=' . $item;
      $count++;
   }
   return $link . $queryFilter;
}