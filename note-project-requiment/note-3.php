<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5&appId=1672938849618450";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="fb-comments"></div>



1. tại sao chọn allshigoto canh tab chiều cao giống nhau. (done)
2. bg search xám. (done)
3. nhớ là captchar nop ho so(done)
4. lưu lại từ khóa search (done)
4. popup email. open request crfs(done)
5. tag job.
	-tag job (career,salary,area,level)
6. tao blog.
7. them popup va ho tro online o tat ca cac trang. (done)
8. thiet lap tin tuyen dung tren top  va trong phan search. (sửa database thêm 2 cột :rec_is_show_top và rec_is_show_another) (done)
	-config số lượng tin (done)
	-chọn tin tuyển dụng ( done)
9. hinh nen cho tin tuyen dung. (hiện tại làm một hinh nền cho tất cả các tin hot trên trang top.) (done).
10. set title tuong ung voi tung page (done).
11. trong quản lý tin tuyển dụng thêm 2 phần :
	- chọn tin hiển thị (done)
	- hủy tin . (done)
12. trong tin dang  co the huy tin va tuy chinh vi tri hien thi. (done)
13. update luot view khi xem tin tuyen dung. (done)
14. hiển thị tin tuyển dụng top và search. (done)
15. convert utf 8 title. (done)
16. hide modal popup get news mail. (done)
17. phần người tìm việc:
	-home (done)
	-menu (done)
	-dang ky (done)
	-doi mat khau (done)
	-tao ho so (done)
	-tai ho so (done)
	-quan ly ho so
		+ xem (done)
		+ sua (done)
		+ xoa (done)
	-xoa ho so tai len (done)
	-xoa lich su tin tuyen dung ung tuyen (done)
	-
18. fix show new job responsie. (done)
19. faq chua lay du lieu tu db len.
20. check neu ton tai slogan thi - header px di. (k can thiet)
21. fix modal show scroll y - admin (done)
22. fix facebook fan page full and responsie (done not work with resize)
23. check if apply recruitment without button apply recruitment (done)
24. chon tinh thnah chua chinh xac lam. (done)
25. check ho sơ tối đa là 3. (done)
26. dk tai khoan roi login. về trang profile. ứng vieenc (done).
27. dang ky nha tuyen dung. rồi về profile nhà tuyển dụng (done)
//28. tao tin tuyen dụng
29. đăng nhập nhà tuyển dụng nhảy loạn xạ. (tam on done).
30. thay doi mat khau nguoi dung dang nhap. thay doi thong tin lien he. thay doi thong tin ntd (done).
31. quản lý người dùng (done)
32. quản lý tin tuyển dụng
32. đăng tin (done)
33. trả về email nếu login thât bại (done)
35. sửa menu nhà tuyển dụng chưa hợp lý (done)
36. PHUC HOI DU LIEU ----
37. bị lỗi tạo tin tuyển dụn admin (done)
38 . thêm breadcrumb trang ứng viên (done)
39. lỗi hiển thị tin tuyển dụng tren trang top (done)
40. chinh slide cham lai (done)
41. luu nhap tin tuyen dung (done)
42. log xoa tin tuyen dung. (chua làm)
43. user dang xoa sua dc tin chinh no. (done)
44. sua tin -> duyet lai tu dau (done)
45. sua css dp-display-inline (done)
46. sua css item-new-job (done)
47. fix tin tuyen dung top tren ie 8 (done)
48. phan quyen cho user tim kiem ho so. (done)
49. trang thai xoa cv va ho so tren trang admin. (done)
50.xoa tin tyen dung (done chua log).
51. thay doi ngon ngu trong breadcrumb (done)
52. thêm chức năng log delte.
53. thay đổi trạng thai delete cV và hồ sơ online của ứng viên (done)
54. thêm chức năng cho phép tìm kiếm hồ sơ (done)
55. bỏ scroll trên modal trang admin thay bằng scrolll khác .
56. sua lai like va commen trne chi tiet tin tyen dujng.
57. thay doi mat khau admin . mat khau log delete.
58. chuc nang quen mat khau.
59. login facebook (done)
60. tao blog.
61. double chat trong suport chat.










path :/var/lib/openshift/55e3d0f72d5271045500020e/app-root/runtime/repo
path old:

AuthType Basic
AuthName "restricted area"
AuthUserFile C:/xampp/htdocs/job/.htpasswd
require valid-user

RewriteEngine on
RewriteBase /job
RewriteCond $1 !^(index\.php|resources|robots\.txt)
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php/$1 [L,QSA]