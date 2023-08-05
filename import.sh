#!/bin/bash

for file in /var/www/html/csv/*.csv
do
  if [ -f "$file" ]; then
    php artisan import:csv "$file" &  # Notice the & operator at the end
    echo "Started import for $file"
  fi
done

# Attendi che tutti i processi in background terminino
wait

echo "All CSV files have been imported."
