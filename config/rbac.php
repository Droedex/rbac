<?php

return [
   /*
   |--------------------------------------------------------------------------
   |  RBAC Permission Storage
   |--------------------------------------------------------------------------
   | db  - No cache, direct database reads on every check
   |
   */

  'driver' => env('RBAC_CACHE_DRIVER', 'db'),
];