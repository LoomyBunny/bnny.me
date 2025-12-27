<div class="nav">
  <?php
  // Get current page for highlighting
  $currentPath = $_SERVER['REQUEST_URI'];
  $currentPath = strtok($currentPath, '?'); // Remove query parameters
  
  $navItems = [
      ['url' => '/', 'text' => 'Home'],
      ['url' => 'https://bnny.me/albums/', 'text' => 'Albums'],
      ['url' => '/projects/', 'text' => 'Projects'],
      ['url' => '/blog/', 'text' => 'Blog']
  ];
  
  foreach ($navItems as $item) {
      // Determine if this is the current page
      $isActive = false;
      if ($item['url'] === '/') {
          $isActive = ($currentPath === '/' || $currentPath === '/index.php');
      } elseif (strpos($item['url'], 'bnny.me') !== false) {
          // Handle external URLs - check if current path matches the path part
          $urlPath = parse_url($item['url'], PHP_URL_PATH);
          $isActive = ($currentPath === $urlPath);
      } else {
          $isActive = (strpos($currentPath, ltrim($item['url'], '/')) !== false);
      }
      
      $activeClass = $isActive ? ' active' : '';
      echo "<form action=\"{$item['url']}\">
        <button type=\"submit\" class=\"{$activeClass}\">{$item['text']}</button>
      </form>";
  }
  ?>
</div>