<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2015-10-13 03:41:15 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 03:41:17 --> Severity: Notice --> Undefined variable: arr_Salary C:\xampp\htdocs\job\application\views\main\create_recruitment.php 41
ERROR - 2015-10-13 03:41:17 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\job\application\views\main\create_recruitment.php 41
ERROR - 2015-10-13 03:41:18 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 03:41:35 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 03:41:35 --> value 4
ERROR - 2015-10-13 03:41:35 --> select b.*,c.*,d.*,e.*,f.*
			from recruitment b
			left join career c on c.career_id = b.rec_job_map_career and c.career_is_delete = 0
			left join employer d on d.employer_id = b.rec_map_employer and d.employer_is_delete = 0
			left join salary e on e.salary_id = b.rec_map_salary and e.salary_is_delete = 0
			left join (select province.*,recmp_map_rec from recruitment_map_province
			join province on province_id = recmp_map_province and recmp_is_delete = 0 group by recmp_map_rec) f on f.recmp_map_rec = b.rec_id
			where  b.rec_is_delete = 0 and b.rec_is_approve = 1 and b.rec_is_disabled = 0  order by b.rec_created_at DESC
ERROR - 2015-10-13 03:41:35 --> select b.*,c.*,d.*,e.*,f.*
			from recruitment b
			left join career c on c.career_id = b.rec_job_map_career and c.career_is_delete = 0
			left join employer d on d.employer_id = b.rec_map_employer and d.employer_is_delete = 0
			left join salary e on e.salary_id = b.rec_map_salary and e.salary_is_delete = 0
			left join (select province.*,recmp_map_rec from recruitment_map_province
			join province on province_id = recmp_map_province and recmp_is_delete = 0 group by recmp_map_rec) f on f.recmp_map_rec = b.rec_id
			where  b.rec_is_delete = 0 and b.rec_is_approve = 1 and b.rec_is_disabled = 0  order by b.rec_created_at DESC limit 0, 10
ERROR - 2015-10-13 03:41:35 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\job\application\views\main\job\jobs.php 138
ERROR - 2015-10-13 03:41:36 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 03:41:36 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 04:06:21 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 04:06:21 --> Severity: Notice --> Undefined variable: arr_Salary C:\xampp\htdocs\job\application\views\main\create_recruitment.php 41
ERROR - 2015-10-13 04:06:21 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\job\application\views\main\create_recruitment.php 41
ERROR - 2015-10-13 04:06:22 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 04:06:24 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 04:06:24 --> value 4
ERROR - 2015-10-13 04:06:24 --> select b.*,c.*,d.*,e.*,f.*
			from recruitment b
			left join career c on c.career_id = b.rec_job_map_career and c.career_is_delete = 0
			left join employer d on d.employer_id = b.rec_map_employer and d.employer_is_delete = 0
			left join salary e on e.salary_id = b.rec_map_salary and e.salary_is_delete = 0
			left join (select province.*,recmp_map_rec from recruitment_map_province
			join province on province_id = recmp_map_province and recmp_is_delete = 0 group by recmp_map_rec) f on f.recmp_map_rec = b.rec_id
			where  b.rec_is_delete = 0 and b.rec_is_approve = 1 and b.rec_is_disabled = 0  order by b.rec_created_at DESC
ERROR - 2015-10-13 04:06:24 --> select b.*,c.*,d.*,e.*,f.*
			from recruitment b
			left join career c on c.career_id = b.rec_job_map_career and c.career_is_delete = 0
			left join employer d on d.employer_id = b.rec_map_employer and d.employer_is_delete = 0
			left join salary e on e.salary_id = b.rec_map_salary and e.salary_is_delete = 0
			left join (select province.*,recmp_map_rec from recruitment_map_province
			join province on province_id = recmp_map_province and recmp_is_delete = 0 group by recmp_map_rec) f on f.recmp_map_rec = b.rec_id
			where  b.rec_is_delete = 0 and b.rec_is_approve = 1 and b.rec_is_disabled = 0  order by b.rec_created_at DESC limit 0, 10
ERROR - 2015-10-13 04:06:24 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\job\application\views\main\job\jobs.php 138
ERROR - 2015-10-13 04:06:24 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 04:06:27 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 04:06:27 --> value 4
ERROR - 2015-10-13 04:06:27 --> select b.*,c.*,d.*,e.*,f.*
			from recruitment b
			left join career c on c.career_id = b.rec_job_map_career and c.career_is_delete = 0
			left join employer d on d.employer_id = b.rec_map_employer and d.employer_is_delete = 0
			left join salary e on e.salary_id = b.rec_map_salary and e.salary_is_delete = 0
			left join (select province.*,recmp_map_rec from recruitment_map_province
			join province on province_id = recmp_map_province and recmp_is_delete = 0 group by recmp_map_rec) f on f.recmp_map_rec = b.rec_id
			where  b.rec_is_delete = 0 and b.rec_is_approve = 1 and b.rec_is_disabled = 0  and b.rec_job_map_country = 2 order by b.rec_created_at DESC
ERROR - 2015-10-13 04:06:27 --> select b.*,c.*,d.*,e.*,f.*
			from recruitment b
			left join career c on c.career_id = b.rec_job_map_career and c.career_is_delete = 0
			left join employer d on d.employer_id = b.rec_map_employer and d.employer_is_delete = 0
			left join salary e on e.salary_id = b.rec_map_salary and e.salary_is_delete = 0
			left join (select province.*,recmp_map_rec from recruitment_map_province
			join province on province_id = recmp_map_province and recmp_is_delete = 0 group by recmp_map_rec) f on f.recmp_map_rec = b.rec_id
			where  b.rec_is_delete = 0 and b.rec_is_approve = 1 and b.rec_is_disabled = 0  and b.rec_job_map_country = 2 order by b.rec_created_at DESC limit 0, 10
ERROR - 2015-10-13 04:06:27 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\job\application\views\main\job\jobs.php 138
ERROR - 2015-10-13 04:06:27 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 04:06:35 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 04:06:39 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 04:06:39 --> value 4
ERROR - 2015-10-13 04:06:39 --> select b.*,c.*,d.*,e.*,f.*
			from recruitment b
			left join career c on c.career_id = b.rec_job_map_career and c.career_is_delete = 0
			left join employer d on d.employer_id = b.rec_map_employer and d.employer_is_delete = 0
			left join salary e on e.salary_id = b.rec_map_salary and e.salary_is_delete = 0
			left join (select province.*,recmp_map_rec from recruitment_map_province
			join province on province_id = recmp_map_province and recmp_is_delete = 0 group by recmp_map_rec) f on f.recmp_map_rec = b.rec_id
			where  b.rec_is_delete = 0 and b.rec_is_approve = 1 and b.rec_is_disabled = 0  and f.province_map_region = 3 and b.rec_job_map_country = 1 order by b.rec_created_at DESC
ERROR - 2015-10-13 04:06:39 --> select b.*,c.*,d.*,e.*,f.*
			from recruitment b
			left join career c on c.career_id = b.rec_job_map_career and c.career_is_delete = 0
			left join employer d on d.employer_id = b.rec_map_employer and d.employer_is_delete = 0
			left join salary e on e.salary_id = b.rec_map_salary and e.salary_is_delete = 0
			left join (select province.*,recmp_map_rec from recruitment_map_province
			join province on province_id = recmp_map_province and recmp_is_delete = 0 group by recmp_map_rec) f on f.recmp_map_rec = b.rec_id
			where  b.rec_is_delete = 0 and b.rec_is_approve = 1 and b.rec_is_disabled = 0  and f.province_map_region = 3 and b.rec_job_map_country = 1 order by b.rec_created_at DESC limit 0, 10
ERROR - 2015-10-13 04:06:39 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\job\application\views\main\job\jobs.php 138
ERROR - 2015-10-13 04:06:39 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 04:06:44 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 04:06:44 --> value 4
ERROR - 2015-10-13 04:06:44 --> select b.*,c.*,d.*,e.*,f.*
			from recruitment b
			left join career c on c.career_id = b.rec_job_map_career and c.career_is_delete = 0
			left join employer d on d.employer_id = b.rec_map_employer and d.employer_is_delete = 0
			left join salary e on e.salary_id = b.rec_map_salary and e.salary_is_delete = 0
			left join (select province.*,recmp_map_rec from recruitment_map_province
			join province on province_id = recmp_map_province and recmp_is_delete = 0 group by recmp_map_rec) f on f.recmp_map_rec = b.rec_id
			where  b.rec_is_delete = 0 and b.rec_is_approve = 1 and b.rec_is_disabled = 0  and f.province_map_region = 2 and b.rec_job_map_country = 1 order by b.rec_created_at DESC
ERROR - 2015-10-13 04:06:44 --> select b.*,c.*,d.*,e.*,f.*
			from recruitment b
			left join career c on c.career_id = b.rec_job_map_career and c.career_is_delete = 0
			left join employer d on d.employer_id = b.rec_map_employer and d.employer_is_delete = 0
			left join salary e on e.salary_id = b.rec_map_salary and e.salary_is_delete = 0
			left join (select province.*,recmp_map_rec from recruitment_map_province
			join province on province_id = recmp_map_province and recmp_is_delete = 0 group by recmp_map_rec) f on f.recmp_map_rec = b.rec_id
			where  b.rec_is_delete = 0 and b.rec_is_approve = 1 and b.rec_is_disabled = 0  and f.province_map_region = 2 and b.rec_job_map_country = 1 order by b.rec_created_at DESC limit 0, 10
ERROR - 2015-10-13 04:06:44 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 04:06:48 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 04:06:48 --> value 4
ERROR - 2015-10-13 04:06:48 --> select b.*,c.*,d.*,e.*,f.*
			from recruitment b
			left join career c on c.career_id = b.rec_job_map_career and c.career_is_delete = 0
			left join employer d on d.employer_id = b.rec_map_employer and d.employer_is_delete = 0
			left join salary e on e.salary_id = b.rec_map_salary and e.salary_is_delete = 0
			left join (select province.*,recmp_map_rec from recruitment_map_province
			join province on province_id = recmp_map_province and recmp_is_delete = 0 group by recmp_map_rec) f on f.recmp_map_rec = b.rec_id
			where  b.rec_is_delete = 0 and b.rec_is_approve = 1 and b.rec_is_disabled = 0  and f.province_map_region = 1 and b.rec_job_map_country = 1 order by b.rec_created_at DESC
ERROR - 2015-10-13 04:06:48 --> select b.*,c.*,d.*,e.*,f.*
			from recruitment b
			left join career c on c.career_id = b.rec_job_map_career and c.career_is_delete = 0
			left join employer d on d.employer_id = b.rec_map_employer and d.employer_is_delete = 0
			left join salary e on e.salary_id = b.rec_map_salary and e.salary_is_delete = 0
			left join (select province.*,recmp_map_rec from recruitment_map_province
			join province on province_id = recmp_map_province and recmp_is_delete = 0 group by recmp_map_rec) f on f.recmp_map_rec = b.rec_id
			where  b.rec_is_delete = 0 and b.rec_is_approve = 1 and b.rec_is_disabled = 0  and f.province_map_region = 1 and b.rec_job_map_country = 1 order by b.rec_created_at DESC limit 0, 10
ERROR - 2015-10-13 04:06:48 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 04:06:53 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 04:06:53 --> value 4
ERROR - 2015-10-13 04:06:53 --> select b.*,c.*,d.*,e.*,f.*
			from recruitment b
			left join career c on c.career_id = b.rec_job_map_career and c.career_is_delete = 0
			left join employer d on d.employer_id = b.rec_map_employer and d.employer_is_delete = 0
			left join salary e on e.salary_id = b.rec_map_salary and e.salary_is_delete = 0
			left join (select province.*,recmp_map_rec from recruitment_map_province
			join province on province_id = recmp_map_province and recmp_is_delete = 0 group by recmp_map_rec) f on f.recmp_map_rec = b.rec_id
			where  b.rec_is_delete = 0 and b.rec_is_approve = 1 and b.rec_is_disabled = 0  and b.rec_job_map_country = 2 order by b.rec_created_at DESC
ERROR - 2015-10-13 04:06:53 --> select b.*,c.*,d.*,e.*,f.*
			from recruitment b
			left join career c on c.career_id = b.rec_job_map_career and c.career_is_delete = 0
			left join employer d on d.employer_id = b.rec_map_employer and d.employer_is_delete = 0
			left join salary e on e.salary_id = b.rec_map_salary and e.salary_is_delete = 0
			left join (select province.*,recmp_map_rec from recruitment_map_province
			join province on province_id = recmp_map_province and recmp_is_delete = 0 group by recmp_map_rec) f on f.recmp_map_rec = b.rec_id
			where  b.rec_is_delete = 0 and b.rec_is_approve = 1 and b.rec_is_disabled = 0  and b.rec_job_map_country = 2 order by b.rec_created_at DESC limit 0, 10
ERROR - 2015-10-13 04:06:53 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\job\application\views\main\job\jobs.php 138
ERROR - 2015-10-13 04:06:53 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 04:07:11 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 04:07:15 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 04:07:15 --> value 4
ERROR - 2015-10-13 04:07:15 --> select b.*,c.*,d.*,e.*,f.*
			from recruitment b
			left join career c on c.career_id = b.rec_job_map_career and c.career_is_delete = 0
			left join employer d on d.employer_id = b.rec_map_employer and d.employer_is_delete = 0
			left join salary e on e.salary_id = b.rec_map_salary and e.salary_is_delete = 0
			left join (select province.*,recmp_map_rec from recruitment_map_province
			join province on province_id = recmp_map_province and recmp_is_delete = 0 group by recmp_map_rec) f on f.recmp_map_rec = b.rec_id
			where  b.rec_is_delete = 0 and b.rec_is_approve = 1 and b.rec_is_disabled = 0  and b.rec_job_map_country = 2 order by b.rec_created_at DESC
ERROR - 2015-10-13 04:07:15 --> select b.*,c.*,d.*,e.*,f.*
			from recruitment b
			left join career c on c.career_id = b.rec_job_map_career and c.career_is_delete = 0
			left join employer d on d.employer_id = b.rec_map_employer and d.employer_is_delete = 0
			left join salary e on e.salary_id = b.rec_map_salary and e.salary_is_delete = 0
			left join (select province.*,recmp_map_rec from recruitment_map_province
			join province on province_id = recmp_map_province and recmp_is_delete = 0 group by recmp_map_rec) f on f.recmp_map_rec = b.rec_id
			where  b.rec_is_delete = 0 and b.rec_is_approve = 1 and b.rec_is_disabled = 0  and b.rec_job_map_country = 2 order by b.rec_created_at DESC limit 0, 10
ERROR - 2015-10-13 04:07:15 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\job\application\views\main\job\jobs.php 138
ERROR - 2015-10-13 04:07:24 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 04:07:25 --> value 4
ERROR - 2015-10-13 04:07:25 --> select b.*,c.*,d.*,e.*,f.*
			from recruitment b
			left join career c on c.career_id = b.rec_job_map_career and c.career_is_delete = 0
			left join employer d on d.employer_id = b.rec_map_employer and d.employer_is_delete = 0
			left join salary e on e.salary_id = b.rec_map_salary and e.salary_is_delete = 0
			left join (select province.*,recmp_map_rec from recruitment_map_province
			join province on province_id = recmp_map_province and recmp_is_delete = 0 group by recmp_map_rec) f on f.recmp_map_rec = b.rec_id
			where  b.rec_is_delete = 0 and b.rec_is_approve = 1 and b.rec_is_disabled = 0  and f.province_map_region = 3 and b.rec_job_map_country = 1 order by b.rec_created_at DESC
ERROR - 2015-10-13 04:07:25 --> select b.*,c.*,d.*,e.*,f.*
			from recruitment b
			left join career c on c.career_id = b.rec_job_map_career and c.career_is_delete = 0
			left join employer d on d.employer_id = b.rec_map_employer and d.employer_is_delete = 0
			left join salary e on e.salary_id = b.rec_map_salary and e.salary_is_delete = 0
			left join (select province.*,recmp_map_rec from recruitment_map_province
			join province on province_id = recmp_map_province and recmp_is_delete = 0 group by recmp_map_rec) f on f.recmp_map_rec = b.rec_id
			where  b.rec_is_delete = 0 and b.rec_is_approve = 1 and b.rec_is_disabled = 0  and f.province_map_region = 3 and b.rec_job_map_country = 1 order by b.rec_created_at DESC limit 0, 10
ERROR - 2015-10-13 04:07:25 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\job\application\views\main\job\jobs.php 138
ERROR - 2015-10-13 04:07:25 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 04:07:25 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 04:19:43 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 04:19:43 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 04:19:43 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 04:20:02 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 04:21:31 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 04:21:31 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 04:21:33 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 04:22:46 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 04:22:47 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 04:22:48 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 04:23:03 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 04:23:04 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 04:23:17 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 04:23:17 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 05:05:13 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 05:05:14 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 05:05:14 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 05:05:36 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 05:05:37 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 05:05:37 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 05:10:11 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 05:10:11 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 05:10:12 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 05:11:22 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 05:11:22 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 05:11:23 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 05:13:39 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 05:13:40 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 05:13:40 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 05:25:09 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 05:25:10 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 05:25:10 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 05:25:32 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 05:25:32 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 05:25:33 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 05:26:37 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 05:26:37 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 05:26:38 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 05:26:48 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 05:26:49 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 05:26:49 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 05:28:12 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 05:28:12 --> Severity: Notice --> Undefined property: stdClass::$rec_job_time C:\xampp\htdocs\job\application\views\main\job\job.php 27
ERROR - 2015-10-13 05:28:12 --> Severity: Notice --> Undefined property: stdClass::$rec_job_time C:\xampp\htdocs\job\application\views\main\job\job.php 27
ERROR - 2015-10-13 05:28:12 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 05:28:13 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 05:30:49 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 05:30:49 --> Query error: Unknown table 'a' - Invalid query: select distinct(recmp_map_rec) ,
					  c.employer_name,c.rec_title,a.*
			   from recruitment_map_province
			   left join ( select a.rec_id,b.employer_name,a.rec_title
			   				from recruitment a
			   				left join employer b
			   				on b.employer_id = a.rec_map_employer and b.employer_is_delete = 0
			   				where a.rec_is_delete = 0 and a.rec_is_disabled = 0 and a.rec_is_approve = 1 ) as c
			   	 on c.rec_id = recmp_map_rec
			   	 where recmp_map_province in
			   	 (select recmp_map_province
			   	 	from recruitment_map_province
			   	 	where recmp_map_rec = '10' and recmp_is_delete = 0)
				and recmp_map_rec <> '10' order by recmp_created_at desc limit 10
ERROR - 2015-10-13 05:31:15 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 05:31:15 --> Query error: Duplicate column name 'rec_id' - Invalid query: select distinct(recmp_map_rec) ,
					  c.employer_name,c.rec_title,c.*
			   from recruitment_map_province
			   left join ( select a.rec_id,b.employer_name,a.rec_title,a.*
			   				from recruitment a
			   				left join employer b
			   				on b.employer_id = a.rec_map_employer and b.employer_is_delete = 0
			   				where a.rec_is_delete = 0 and a.rec_is_disabled = 0 and a.rec_is_approve = 1 ) as c
			   	 on c.rec_id = recmp_map_rec
			   	 where recmp_map_province in
			   	 (select recmp_map_province
			   	 	from recruitment_map_province
			   	 	where recmp_map_rec = '10' and recmp_is_delete = 0)
				and recmp_map_rec <> '10' order by recmp_created_at desc limit 10
ERROR - 2015-10-13 05:46:12 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 05:46:13 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 05:46:13 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 05:46:48 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 05:46:48 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 05:46:49 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 05:47:51 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 05:47:51 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 05:47:52 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 05:50:55 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 05:50:55 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 05:50:56 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 06:01:34 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 06:01:34 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 06:01:46 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 06:01:46 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 06:01:54 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 06:01:54 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 06:01:57 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 06:01:57 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 06:01:59 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 06:02:00 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 06:02:42 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 06:03:17 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 06:03:17 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 06:03:18 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 06:03:37 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 06:03:37 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 06:04:33 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 06:04:33 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 06:25:08 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 06:25:08 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 06:25:09 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 06:27:28 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 06:27:28 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 06:27:30 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 06:27:39 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 06:27:46 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 06:27:47 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 06:27:49 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 06:28:52 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 06:28:52 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 06:28:53 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 06:31:29 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 06:31:30 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 06:31:30 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 06:31:37 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 06:31:38 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 06:31:38 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 06:35:48 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 06:35:49 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 06:35:49 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 06:36:49 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 06:36:57 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 06:36:58 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 06:36:58 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 06:38:11 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 06:38:11 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 06:38:12 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 07:00:03 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 08:34:15 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 08:34:15 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 08:34:15 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 08:35:46 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 09:05:04 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 09:05:05 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 09:05:05 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 09:05:46 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 09:05:46 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 09:06:33 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 09:52:00 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 09:52:00 --> http://localhost/job/job/asp.net-developer123-2.html
ERROR - 2015-10-13 09:52:01 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 09:52:06 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 09:52:06 --> http://localhost/job/job/asp.net-developer123-2.html
ERROR - 2015-10-13 09:52:06 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 09:52:06 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 09:52:06 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 09:52:09 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 09:52:11 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 09:52:11 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 09:52:11 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 09:52:11 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 09:52:35 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 09:52:36 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 09:52:36 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 09:52:36 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 09:52:37 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 09:52:38 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 09:52:38 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 09:52:38 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 09:52:42 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 09:52:45 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 09:52:45 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 09:52:47 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 09:52:48 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 09:52:49 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 09:52:51 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 09:52:52 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 09:52:52 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 09:52:52 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 09:52:54 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 09:52:55 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 09:52:55 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 09:52:55 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 09:52:57 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 09:52:57 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 09:53:07 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 09:53:08 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 09:53:12 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 09:53:13 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 09:53:14 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 09:53:55 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 09:53:55 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 09:54:55 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 09:54:55 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 09:55:56 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 09:55:56 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 09:56:56 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 09:56:56 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 09:57:57 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 09:57:57 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 09:58:57 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 09:58:57 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 09:59:57 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 09:59:57 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 10:00:57 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 10:00:57 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 10:01:57 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 10:01:57 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 10:02:43 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 10:02:44 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 10:02:45 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 10:02:58 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 10:02:58 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 10:03:01 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 10:03:01 --> Severity: Notice --> Undefined variable: arr_Salary C:\xampp\htdocs\job\application\views\main\create_recruitment.php 41
ERROR - 2015-10-13 10:03:01 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\job\application\views\main\create_recruitment.php 41
ERROR - 2015-10-13 10:03:02 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 10:03:08 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 10:03:10 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 10:03:12 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 10:03:12 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\job\application\views\main\job\job-search.php 138
ERROR - 2015-10-13 10:03:12 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 10:03:13 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 10:03:17 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 10:03:18 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 10:03:18 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 10:03:26 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 10:03:27 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 10:03:27 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 10:03:58 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 10:03:58 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 10:04:07 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 10:04:07 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 10:04:07 --> Severity: Notice --> Undefined variable: arr_Salary C:\xampp\htdocs\job\application\views\main\create_recruitment.php 41
ERROR - 2015-10-13 10:04:07 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\job\application\views\main\create_recruitment.php 41
ERROR - 2015-10-13 10:04:08 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 10:04:11 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 10:04:11 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\job\application\views\main\job\job-search.php 138
ERROR - 2015-10-13 10:04:12 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 10:04:12 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 10:04:18 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 10:04:19 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 10:04:20 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 10:04:31 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 10:21:30 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 10:21:30 --> http://localhost/job/job/tuyen-nhan-vien-10.html
ERROR - 2015-10-13 10:21:30 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 10:21:38 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 10:21:38 --> http://localhost/job/job/tuyen-nhan-vien-10.html
ERROR - 2015-10-13 10:21:38 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 10:21:39 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 10:21:39 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 10:21:49 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 10:23:00 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 10:23:01 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 10:23:02 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 10:23:11 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 10:23:13 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 10:23:24 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 10:23:52 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 10:23:52 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 10:23:53 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 10:24:15 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 10:24:16 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 10:24:16 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 10:24:37 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 10:24:38 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 10:24:38 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 10:24:48 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 10:24:54 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 10:24:59 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 10:24:59 --> application/msword
ERROR - 2015-10-13 10:24:59 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 10:25:14 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 10:25:14 --> 2-10-doccv
ERROR - 2015-10-13 10:44:41 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 10:44:42 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 10:44:42 --> Severity: Notice --> Undefined variable: arr_Salary C:\xampp\htdocs\job\application\views\main\create_recruitment.php 41
ERROR - 2015-10-13 10:44:42 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\job\application\views\main\create_recruitment.php 41
ERROR - 2015-10-13 10:44:42 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 15:54:43 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 15:54:46 --> Severity: Notice --> Undefined variable: arr_Salary C:\xampp\htdocs\job\application\views\main\create_recruitment.php 41
ERROR - 2015-10-13 15:54:46 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\job\application\views\main\create_recruitment.php 41
ERROR - 2015-10-13 15:55:00 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 16:12:52 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 16:12:53 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\job\application\views\main\job\job-search.php 138
ERROR - 2015-10-13 16:12:53 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 16:12:53 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 16:12:56 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 16:12:56 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 16:12:56 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 16:29:23 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 16:29:23 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
ERROR - 2015-10-13 16:29:26 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\job\application\vendor/autoload.php was not found.
