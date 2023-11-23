<?php
	function main($choosenFolder) {
		$folderContentItems = scandir($choosenFolder);
		foreach($folderContentItems as $folderContentItem) {
			if ($folderContentItem != '.' && $folderContentItem != '..') {
	            $currentPath = $choosenFolder . '/' . $folderContentItem;
	            if (is_dir($currentPath)) {
	                main($currentPath);
	            } else {
	                $info = getimagesize($currentPath);
	                if ($info !== false) {
	                    $mime = $info['mime'];
	                    if (
	                    	($mime == 'image/jpeg' && pathinfo($currentPath, PATHINFO_EXTENSION) != 'jpg') ||
	                        ($mime == 'image/png' && pathinfo($currentPath, PATHINFO_EXTENSION) != 'png')) {
	                        echo "Тип файла не соответствует расширению : $currentPath\n";
	                    }
	                }
	            }
        	}	
    	} 
	}

	main(getcwd());