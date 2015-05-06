<?php
require __DIR__ . "/../../../bootstrap.php";


Queue::killAllDeadThreads(220);
for ($i = 0; $i < 75; $i++) {
  Queue::fetchAndProceed();
}

echo "\ndone;\n";
