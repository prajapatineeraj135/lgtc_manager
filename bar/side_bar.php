

<div class="sidebar">
    <div class="sidebar-item">

        <a><?php echo $_SESSION['firstname']; ?></a><br>
        <a href="javascript:void(0);" onclick="toggleSubMenu('menu1')">Bilty</a>
        <div class="sub-menu" id="menu1">
            <a onclick="redirectToOtherPage7()">Entry</a><br>
            <a onclick="redirectToOtherPage8()">Search</a><br><br>
            
        </div>

        <a href="javascript:void(0);" onclick="toggleSubMenu('menu2')">Main Challan</a><br>
        <div class="sub-menu" id="menu2">
            <a onclick="redirectToOtherPage1()">Entry</a><br>
            <a onclick="redirectToOtherPage2()">Update</a><br>
            <a onclick="redirectToOtherPage3()">Filter</a><br><br>
        </div>

        <a href="javascript:void(0);" onclick="toggleSubMenu('menu3')">Create</a><br>
        <div class="sub-menu" id="menu3">
            <a onclick="redirectToOtherPage4()">Station</a><br>
            <a onclick="redirectToOtherPage5()">Consignor</a><br>
            <a onclick="redirectToOtherPage6()">Consignee</a><br><br>
        </div>


        <a href="javascript:void(0);" onclick="printTable()">Print</a><br>
        <a onclick="redirectToOtherPage11()">Logout</a><br>
    </div>
</div>

<script>
    function toggleSubMenu(menuId) {
        const submenu = document.getElementById(menuId);
        submenu.style.display = submenu.style.display === 'block' ? 'none' : 'block';
    }

    function redirectToOtherPage1() { window.location.href = 'http://localhost/lgtc/main_challan/page_challan_form.php'; }
    function redirectToOtherPage2() { window.location.href = 'http://localhost/lgtc/main_challan/page_challan_search.php'; }
    function redirectToOtherPage3() { window.location.href = 'http://localhost/lgtc/main_challan/page_filter_all_challan.php'; }
    function redirectToOtherPage4() { window.location.href = 'http://localhost/lgtc/create_station/'; }
    function redirectToOtherPage5() { window.location.href = 'http://localhost/lgtc/create_consignor/'; }
    function redirectToOtherPage6() { window.location.href = 'http://localhost/lgtc/create_consignee/'; }
    function redirectToOtherPage7() { window.location.href = 'http://localhost/lgtc/bilty/'; }
    function redirectToOtherPage8() { window.location.href = 'http://localhost/lgtc/bilty/'; }
    function redirectToOtherPage11() { window.location.href = 'http://localhost/lgtc/login/logout.php'}
    function printTable() {
        var printContent = document.getElementsByClassName('bilty_box_print');
        var printWindow = window.open('', '', 'width=1000,height=1000');

        printWindow.document.write('<html><head><style>body { text-align: center; } h1, a { display: block; text-align: center; margin-bottom: 0; } table { width: 100%; border-collapse: collapse; margin-top: 10px; margin-bottom: 2px; } th, td { padding: 2px; text-align: center; border: 1px solid #ddd; } th { background-color: #f4f4f4; font-size: 16px; color: #333; } td { font-size: 14px; color: #555; } </style></head><body>');
        printWindow.document.write('<h1>Lal Golden Logistic</h1>');
        printWindow.document.write('<a>Kumharo Ka Mohalla, Geeta Bhawan Road, Purani Sabji Mandi, Kota - 06 (Raj.)<br>Plot-108, Jain Mandir Ki Gali, Kali Majjid Ke Pass, New Dhan Mandi, Kota - 01 (Raj.)<br>Contact - 9636809036, 7014339463</a><br>');
        printWindow.document.write('<a align="center">__________________________________________________________________________________________</a>');

        for (var i = 0; i < printContent.length; i++) {
            printWindow.document.write(printContent[i].outerHTML);
        }


        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();
        printWindow.close();
    }
</script>

