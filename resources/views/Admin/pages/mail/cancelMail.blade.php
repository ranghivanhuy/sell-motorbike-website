<div marginheight="0" marginwidth="0" style="background:#f0f0f0">
    <div id="wrapper" style="background-color:#f0f0f0">
        <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="margin:0 auto;width:600px!important;min-width:600px!important" class="container">
            <tbody>
                <tr>
                    <td align="center" valign="middle" style="background:#ffffff">
                        <table style="width:580px;border-bottom:1px solid #ff3333" cellpadding="0" cellspacing="0" border="0">
                            <tbody>
                                <tr>
                                    <td align="left" valign="middle" style="width:500px;height:60px">
                                        <a href="#" style="border:0" target="_blank" width="130" height="35" style="display:block;border:0px">
                                            <img src="https://i.imgur.com/SJMpt6k.png" height="100" width="115" style="display:block;border:0px;float: left;"> <b style="float: left;line-height: 100px;color: red;font-size: 20px;">Moto Shop</b>
                                        </a>
                                    </td>
                                    <td align="right" valign="middle" style="padding-right:15px">
                                        <a href="" style="border:0"> 
                                            <img src="https://i.imgur.com/eL1uAJx.png" height="36" width="115" style="display:block;border:0px"> 
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" valign="middle" style="background:#ffffff">
                        <table style="width:580px" cellpadding="0" cellspacing="0" border="0">
                            <tbody>
                                <tr>
                                    <td align="left" valign="middle" style="font-family:Arial,Helvetica,sans-serif;font-size:24px;color:#ff3333;text-transform:uppercase;font-weight:bold;padding:25px 10px 15px 10px">
                                        Th??ng b??o ????n h??ng c???a b???n ???? b??? h???y
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" valign="middle" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;padding:0 10px 20px 10px;line-height:17px">
                                        Ch??o {{$order->name}},
                                        <br> C??m ??n b???n ???? mua s???m t???i Moto Shop
                                        <br>
                                        <br> ????n h??ng c???a b???n ????
                                        <b>b??? h???y </b>  
                                        <br> Ch??ng t??i r???t ti???c g???i l???i <b>xin l???i </b> ?????n b???n.
                                        <br> B???n vui l??ng ch???n s???n ph???m kh??c t??? trang web c???a ch??ng t??i t???i ?????a ch??? <b>motoshop.com</b>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" valign="middle" style="background:#ffffff">
                        <table style="width:580px;border:1px solid #ff3333;border-top:3px solid #ff3333" cellpadding="0" cellspacing="0" border="0">
                            <tbody>
                                <tr>
                                    <td colspan="2" align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:14px;color:#666666;padding:10px 10px 20px 15px;line-height:17px"> 
                                        <b>????n h??ng c???a b???n #</b> 
                                        <a href="#" style="color:#ed2324;font-weight:bold;text-decoration:none" target="_blank">{{$order->id}}
                                        </a>
                                        <span style="font-size:12px">({{$order->date}})</span>
                                    </td>
                                </tr>
                                @foreach($orderdetail as $key=>$value)
                                    <tr>
                                        <td align="left" valign="top" style="width:120px;padding-left:15px">
                                            <a href="#_" style="border:0"> 
                                                <img src="" height="120" width="120" style="display:block;border:0px"> 
                                            </a>
                                        </td>
                                        <td align="left" valign="top">
                                            <table style="width:100%" cellpadding="0" cellspacing="0" border="0">
                                                <tbody>
                                                    <tr>
                                                        <td align="left" valign="top" style="width:120px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;padding-left:15px;padding-right:10px;line-height:20px;padding-bottom:5px"> 
                                                            <b>S???n ph???m</b>
                                                        </td>
                                                        <td align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-bottom:5px">:</td>
                                                        <td align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-left:10px;padding-bottom:5px">
                                                             <a href="#" style="color:#115fff;text-decoration:none" target="_blank">
                                                               {{$value->product->name}}
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" valign="top" style="width:120px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;padding-left:15px;padding-right:10px;line-height:20px;padding-bottom:5px"> 
                                                            <b>T??n Shop</b>
                                                        </td>
                                                        <td align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-bottom:5px">:</td>
                                                        <td align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-left:10px;padding-bottom:5px"> 
                                                            <a href="#" style="color:#115fff;text-decoration:none" target="_blank">
                                                                Moto Cycel
                                                            </a>
                                                            - 0934830333
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" valign="top" style="width:120px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-left:15px;padding-right:10px;padding-bottom:5px"> 
                                                            <b>T???ng thanh to??n</b>
                                                        </td>
                                                        <td align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-bottom:5px">:</td>
                                                        <td align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-left:10px;padding-bottom:5px">
                                                            {{number_format(
                                                                $order->order_total)}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" valign="top" style="width:120px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-left:15px;padding-right:10px;padding-bottom:5px"> 
                                                            <b>Ng?????i nh???n</b>
                                                        </td>
                                                        <td align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-bottom:5px">:</td>
                                                        <td align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-left:10px;padding-bottom:5px"> 
                                                            <b>{{$order->user_name}}</b> - {{$order->phone}}
                                                            <br>
                                                           {{$order->address}}
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="2" align="center" valign="top" style="padding-top:20px;padding-bottom:20px;border-bottom:1px solid #ebebeb">
                                        <a href="#" style="border:0px" target="_blank"> 
                                            <img src="https://i.imgur.com/f92hL68.jpg" height="29" width="191" alt="Chi ti???t ????n h??ng" style="border:0px"> 
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" valign="middle" style="background:#ffffff;padding-top:20px">
                        <table style="width:500px" cellpadding="0" cellspacing="0" border="0">
                            <tbody>
                                <tr>
                                    <td align="center" valign="middle" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-bottom:5px"> 
                                        ????y l?? th?? t??? ?????ng t??? h??? th???ng. Vui l??ng kh??ng tr??? l???i email n??y.
                                        <br> N???u c?? b???t k??? th???c m???c hay c???n gi??p ?????, B???n vui l??ng gh?? th??m 
                                        <b style="font-family:Arial,Helvetica,sans-serif;font-size:13px;text-decoration:none;font-weight:bold">Trung t??m tr??? gi??p</b> c???a ch??ng t??i t???i ?????a ch???: 
                                        <a href="#" style="font-family:Arial,Helvetica,sans-serif;font-size:13px;color:#0066cc;text-decoration:none;font-weight:bold" target="_blank">
                                            motoshop.vn
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div> 
</div>