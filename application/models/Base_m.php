<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base_m extends CI_Model  
{
    public function create_table($table) {
	    return $this->db->query('CREATE TABLE '.$table.' (
	    	id int NOT NULL AUTO_INCREMENT,
	    	created DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, 
	    	title TEXT,
	    	subtitle TEXT,
	    	description TEXT,
	    	photo TEXT,
	    	alt TEXT,
	    	PRIMARY KEY(id)
	    );');  
    }
    
    public function create_column($table, $name) {
	    return $this->db->query('ALTER TABLE '.$table.' ADD '.$name.' text; ');  
    }

    public function create_base() {
        $query = $this->db->query('SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";');  
        $query = $this->db->query('SET AUTOCOMMIT = 0;');  
        $query = $this->db->query('START TRANSACTION;');  
        $query = $this->db->query('SET time_zone = "+00:00";');  

        $query = $this->db->query('CREATE TABLE `contact_settings` (
                                    `id` int(11) NOT NULL,
                                    `company` text COLLATE utf8_polish_ci NOT NULL,
                                    `name` text COLLATE utf8_polish_ci NOT NULL,
                                    `map` text COLLATE utf8_polish_ci NOT NULL,
                                    `address` text COLLATE utf8_polish_ci NOT NULL,
                                    `city` text COLLATE utf8_polish_ci NOT NULL,
                                    `zip_code` text COLLATE utf8_polish_ci NOT NULL,
                                    `phone1` text COLLATE utf8_polish_ci NOT NULL,
                                    `phone2` text COLLATE utf8_polish_ci NOT NULL,
                                    `email1` text COLLATE utf8_polish_ci NOT NULL,
                                    `email2` text COLLATE utf8_polish_ci NOT NULL,
                                    `label1` text COLLATE utf8_polish_ci NOT NULL,
                                    `label2` text COLLATE utf8_polish_ci NOT NULL,
                                    `label3` text COLLATE utf8_polish_ci NOT NULL,
                                    `label4` text COLLATE utf8_polish_ci NOT NULL
                                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;');  
        $query = $this->db->query('INSERT INTO `contact_settings` (`id`, `company`, `name`, `map`, `address`, `city`, `zip_code`,                           `phone1`, `phone2`, `email1`, `email2`, `label1`, `label2`, `label3`, `label4`) VALUES
                                    (1, "", "", "", "", "", "", "", "", "", "", "", "", "", "");');  

                                    
        $query = $this->db->query('CREATE TABLE `example` (
                                    `id` int(11) NOT NULL,
                                    `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                    `title` text COLLATE utf8_polish_ci NOT NULL,
                                    `subtitle` text COLLATE utf8_polish_ci NOT NULL,
                                    `description` text COLLATE utf8_polish_ci NOT NULL,
                                    `photo` text COLLATE utf8_polish_ci NOT NULL,
                                    `alt` text COLLATE utf8_polish_ci NOT NULL
                                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;');  
        
        $query = $this->db->query('CREATE TABLE `gallery` (
                                    `id` int(11) NOT NULL,
                                    `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                    `photo` text COLLATE utf8_polish_ci NOT NULL,
                                    `alt` text COLLATE utf8_polish_ci NOT NULL,
                                    `table_name` text COLLATE utf8_polish_ci NOT NULL,
                                    `item_id` int(11) NOT NULL
                                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;');  

        $query = $this->db->query('CREATE TABLE `mails` (
                                    `id` int(11) NOT NULL,
                                    `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                    `answer` int(11) NOT NULL,
                                    `name` text COLLATE utf8_polish_ci NOT NULL,
                                    `email` text COLLATE utf8_polish_ci NOT NULL,
                                    `phone` text COLLATE utf8_polish_ci NOT NULL,
                                    `subject` text COLLATE utf8_polish_ci NOT NULL,
                                    `message` text COLLATE utf8_polish_ci NOT NULL,
                                    `attachment` text COLLATE utf8_polish_ci NOT NULL,
                                    `rodo1` int(11) NOT NULL,
                                    `rodo2` int(11) NOT NULL
                                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;');  

        $query = $this->db->query('CREATE TABLE `media` (
                                    `id` int(11) NOT NULL,
                                    `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                    `name` text COLLATE utf8_polish_ci NOT NULL,
                                    `raw_name` text COLLATE utf8_polish_ci NOT NULL,
                                    `type` text COLLATE utf8_polish_ci NOT NULL,
                                    `size` float NOT NULL,
                                    `full_path` text COLLATE utf8_polish_ci NOT NULL,
                                    `file_path` text COLLATE utf8_polish_ci NOT NULL
                                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;');  

        $query = $this->db->query('CREATE TABLE `settings` (
                                    `id` int(11) NOT NULL,
                                    `meta_title` text COLLATE utf8_polish_ci NOT NULL,
                                    `description` text COLLATE utf8_polish_ci NOT NULL,
                                    `keywords` text COLLATE utf8_polish_ci NOT NULL,
                                    `privace` text COLLATE utf8_polish_ci NOT NULL,
                                    `logo` text COLLATE utf8_polish_ci NOT NULL,
                                    `fb_link` text COLLATE utf8_polish_ci NOT NULL,
                                    `inst_link` text COLLATE utf8_polish_ci NOT NULL,
                                    `yt_link` text COLLATE utf8_polish_ci NOT NULL,
                                    `tw_link` text COLLATE utf8_polish_ci NOT NULL
                                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;');  

        $query = $this->db->query('INSERT INTO `settings` (`id`, `meta_title`, `description`, `keywords`, `privace`, `logo`,                                `fb_link`, `inst_link`, `yt_link`, `tw_link`) VALUES
                                    (1, "", "", "", "", "", "", "", "", "");');  

        $query = $this->db->query('CREATE TABLE `subpages` (
                                    `id` int(11) NOT NULL,
                                    `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                    `title` text COLLATE utf8_polish_ci NOT NULL,
                                    `subtitle` text COLLATE utf8_polish_ci NOT NULL,
                                    `description` text COLLATE utf8_polish_ci NOT NULL,
                                    `photo` text COLLATE utf8_polish_ci NOT NULL,
                                    `alt` text COLLATE utf8_polish_ci NOT NULL,
                                    `page` text COLLATE utf8_polish_ci NOT NULL
                                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;');  

        $query = $this->db->query('CREATE TABLE `users` (
                                    `id` int(11) NOT NULL,
                                    `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                    `active` int(11) NOT NULL,
                                    `login` text COLLATE utf8_polish_ci NOT NULL,
                                    `email` text COLLATE utf8_polish_ci NOT NULL,
                                    `password` text COLLATE utf8_polish_ci NOT NULL,
                                    `first_name` text COLLATE utf8_polish_ci NOT NULL,
                                    `last_name` text COLLATE utf8_polish_ci NOT NULL,
                                    `avatar` text COLLATE utf8_polish_ci NOT NULL,
                                    `rola` text COLLATE utf8_polish_ci NOT NULL
                                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;');  

        $query = $this->db->query('INSERT INTO `users` (`id`, `created`, `active`, `login`, `email`, `password`, `first_name`,           `last_name`, `avatar`, `rola`) VALUES
                (1, "2019-04-10 13:48:15", 1, "admin", "dawid.plociennik13@gmail.com", "$2y$12$w0SOOfP5i7i32aSjxKLZs.ZY0qeaht3Q8Xj.btLaSVsKrK3VLM/ma", "Dawid", "Płóciennik", "", "administrator");');  

        $query = $this->db->query('ALTER TABLE `contact_settings` ADD PRIMARY KEY (`id`);');  

        $query = $this->db->query('ALTER TABLE `example` ADD PRIMARY KEY (`id`);');  

        $query = $this->db->query('ALTER TABLE `gallery` ADD PRIMARY KEY (`id`);');  

        $query = $this->db->query('ALTER TABLE `mails` ADD PRIMARY KEY (`id`);');  

        $query = $this->db->query('ALTER TABLE `media` ADD PRIMARY KEY (`id`);');  

        $query = $this->db->query('ALTER TABLE `settings` ADD PRIMARY KEY (`id`);');  

        $query = $this->db->query('ALTER TABLE `subpages` ADD PRIMARY KEY (`id`);');  

        $query = $this->db->query('ALTER TABLE `users` ADD PRIMARY KEY (`id`);');  

        $query = $this->db->query('ALTER TABLE `contact_settings` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;');  

        $query = $this->db->query('ALTER TABLE `example` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;');  

        $query = $this->db->query('ALTER TABLE `gallery` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;');  

        $query = $this->db->query('ALTER TABLE `mails` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;');  

        $query = $this->db->query('ALTER TABLE `media` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;');  

        $query = $this->db->query('ALTER TABLE `settings` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;');  

        $query = $this->db->query('ALTER TABLE `subpages` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;'); 

        $query = $this->db->query('ALTER TABLE `users` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;');  

        return $query;
    }
}
