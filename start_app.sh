gnome-terminal -- bash -c "echo "202210" | sudo -S systemctl start mysql; exec bash"
gnome-terminal -- bash -c "cd Desktop/source/WareHouseManage-Ringnet/; echo "202210" | sudo -S php artisan serve --host=$(hostname -I | cut -d' ' -f1) --port=80; exec bash"
gnome-terminal -- bash -c "cd Desktop/source/WareHouseManage-Ringnet/; npm run automation;"
gnome-terminal -- bash -c "cd Desktop/source/WareHouseManage-Ringnet/; php artisan schedule:work; exec bash"
