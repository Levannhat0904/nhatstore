<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            margin: 10%;
        }
    </style>
</head>

<body>
    <div style="padding:30px 20px">
        <table align="center" bgcolor="#dcf0f8" border="0" cellpadding="0" cellspacing="0"
            style="margin:0;padding:0;background-color:#ffffff;width:100%!important;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px"
            width="100%">
            <tbody>
                <tr>
                    <td>
                        <h1 style="font-size:17px;font-weight:bold;color:#444;padding:0 0 5px 0;margin:0">Cảm ơn quý
                            khách {{$username}} đã đặt hàng tại <span class="il">Nhật Store</span>,</h1>

                        <p
                            style="margin:4px 0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal">
                            <span class="il">Tiki</span> rất vui thông báo đơn hàng {{$orderCode}} của quý khách đã được
                            tiếp nhận và đang trong quá trình xử lý. <span class="il">Nhật Store</span> sẽ thông báo đến
                            quý khách ngay khi hàng chuẩn bị được giao.
                        </p>

                        <h3
                            style="font-size:13px;font-weight:bold;color:#02acea;text-transform:uppercase;margin:20px 0 0 0;border-bottom:1px solid #ddd">
                            Thông tin đơn hàng {{$orderCode}} <span
                                style="font-size:12px;color:#777;text-transform:none;font-weight:normal">({{$product_date}})</span></h3>
                    </td>
                </tr>
                <tr>
                    <td style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th align="left"
                                        style="padding:6px 9px 0px 9px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;font-weight:bold"
                                        width="50%">Thông tin thanh toán</th>
                                    <th align="left"
                                        style="padding:6px 9px 0px 9px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;font-weight:bold"
                                        width="50%"> Địa chỉ giao hàng </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="padding:3px 9px 9px 9px;border-top:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal"
                                        valign="top"><span style="text-transform:capitalize">{{$username}}</span><br>
                                        <a href="mailto:hiamnhatdz203@gmail.com"
                                            target="_blank">{{ $email }}</a><br>
                                        {{ $phone_number }}
                                    </td>
                                    <td style="padding:3px 9px 9px 9px;border-top:0;border-left:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal"
                                        valign="top"><span style="text-transform:capitalize">{{$username}}</span><br>
                                        <a href="mailto:hiamnhatdz203@gmail.com"
                                            target="_blank">{{ $email }}</a><br>
                                        {{ $address }}<br>
                                        SĐT: {{ $phone_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2"
                                        style="padding:7px 9px 0px 9px;border-top:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444"
                                        valign="top">
                                        <p
                                            style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal">
                                            <strong>Phương thức thanh toán: </strong> Thanh toán tiền mặt khi nhận
                                            hàng<br>
                                            <strong>Thời gian giao hàng dự kiến:</strong> Dự kiến giao hàng {{$product_date->modify('+3 day')->format('Y-m-d')}}- không giao ngày Chủ Nhật <br>
                                            <strong>Phí vận chuyển: </strong> 30.000đ<br>
                                            {{-- <strong>Sử dụng bọc sách cao cấp Bookcare: </strong>  Không <br> --}}
                                        </p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p
                            style="margin:4px 0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal">
                            <i>Lưu ý: Đối với đơn hàng đã được thanh toán trước, nhân viên giao nhận có thể yêu cầu
                                người nhận hàng cung cấp CMND / giấy phép lái xe để chụp ảnh hoặc ghi lại thông tin.</i>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h2
                            style="text-align:left;margin:10px 0;border-bottom:1px solid #ddd;padding-bottom:5px;font-size:13px;color:#02acea">
                            CHI TIẾT ĐƠN HÀNG</h2>

                        <table border="0" cellpadding="0" cellspacing="0" style="background:#f5f5f5" width="100%">
                            <thead>
                                <tr>
                                    <th align="left" bgcolor="#02acea"
                                        style="padding:6px 9px;color:#fff;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:14px">
                                        Sản phẩm</th>
                                    <th align="left" bgcolor="#02acea"
                                        style="padding:6px 9px;color:#fff;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:14px">
                                        Đơn giá</th>
                                    <th align="left" bgcolor="#02acea"
                                        style="padding:6px 9px;color:#fff;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:14px">
                                        Số lượng</th>
                                    <th align="left" bgcolor="#02acea"
                                        style="padding:6px 9px;color:#fff;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:14px">
                                        Giảm giá</th>
                                    <th align="right" bgcolor="#02acea"
                                        style="padding:6px 9px;color:#fff;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:14px">
                                        Tổng tạm</th>
                                </tr>
                            </thead>
                            <tbody bgcolor="#eee"
                                style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px">
                                <tr>
                                    <td align="left" style="padding:3px 9px" valign="top"><span>{{ $product_name }}
                                            - {{ $color }}</span><br>
                                    </td>
                                    <td align="left" style="padding:3px 9px" valign="top">
                                        <span>{{ number_format($price, 0, ',', '.') }}{{ 'vnđ' }}</span></td>
                                    <td align="left" style="padding:3px 9px" valign="top">{{ $qty_buy }}</td>
                                    <td align="left" style="padding:3px 9px" valign="top"><span>0vnđ</span></td>
                                    <td align="right" style="padding:3px 9px" valign="top">
                                        <span>{{ number_format($price, 0, ',', '.') }}{{ 'vnđ' }}</span></td>
                                </tr>
                            </tbody>
                            <tfoot
                                style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px">
                                <tr>
                                    <td align="right" colspan="4" style="padding:5px 9px">Tạm tính</td>
                                    <td align="right" style="padding:5px 9px">
                                        <span>{{ number_format($price, 0, ',', '.') }}{{ 'vnđ' }}</span></td>
                                </tr>
                                <tr>
                                    <td align="right" colspan="4" style="padding:5px 9px">Phí vận chuyển</td>
                                    <td align="right" style="padding:5px 9px"><span>30.000vnđ</span></td>
                                </tr>

                                <tr bgcolor="#eee">
                                    <td align="right" colspan="4" style="padding:7px 9px"><strong><big>Tổng giá trị
                                                đơn hàng</big> </strong></td>
                                    <td align="right" style="padding:7px 9px">
                                        <strong><big><span>{{ number_format($total_order, 0, ',', '.') }}{{ 'vnđ' }}</span>
                                            </big> </strong></td>
                                </tr>
                                {{-- <tr bgcolor="#eee">
                                    <td align="right" colspan="4" style="padding:7px 9px"><strong><big>Thưởng
                                                Astra</big> </strong></td>
                                    <td align="right" style="padding:7px 9px"><strong><big><span>1.44</span> </big>
                                        </strong></td>
                                </tr> --}}

                            </tfoot>
                        </table>

                        {{-- <div style="margin:auto"><a
                                href="https://x64km.mjt.lu/lnk/EAAAA8YY3CIAAAAKFZgAAJSoWj0AAAAA3NwAAAAAABPsQgBj4-EGE32OUpUFR8ipqZQzynXt_gAPBhU/5/cundoV6QYQAUMSMLIqEMCg/aHR0cHM6Ly90aWtpLnZuL3NhbGVzL29yZGVyL3ZpZXcvNzk0NjYwNTc4"
                                style="display:inline-block;text-decoration:none;background-color:#00b7f1!important;margin-right:30px;text-align:center;border-radius:3px;color:#fff;padding:5px 10px;font-size:12px;font-weight:bold;margin-left:35%;margin-top:5px"
                                target="_blank"
                                data-saferedirecturl="https://www.google.com/url?q=https://x64km.mjt.lu/lnk/EAAAA8YY3CIAAAAKFZgAAJSoWj0AAAAA3NwAAAAAABPsQgBj4-EGE32OUpUFR8ipqZQzynXt_gAPBhU/5/cundoV6QYQAUMSMLIqEMCg/aHR0cHM6Ly90aWtpLnZuL3NhbGVzL29yZGVyL3ZpZXcvNzk0NjYwNTc4&amp;source=gmail&amp;ust=1683298949669000&amp;usg=AOvVaw0z7JXUdMmcbk4cK3E9o_Op">Chi
                                tiết đơn hàng tại <span class="il">Tiki</span></a></div> --}}
                    </td>
                </tr>
                {{-- <tr>
                    <td>&nbsp;
                        <a href="https://x64km.mjt.lu/lnk/EAAAA8YY3CIAAAAKFZgAAJSoWj0AAAAA3NwAAAAAABPsQgBj4-EGE32OUpUFR8ipqZQzynXt_gAPBhU/6/KcAOvp1ftSvIZrOqA4L7cQ/aHR0cHM6Ly90aWtpLnZuL3NlcC9ob21l"
                            target="_blank"
                            data-saferedirecturl="https://www.google.com/url?q=https://x64km.mjt.lu/lnk/EAAAA8YY3CIAAAAKFZgAAJSoWj0AAAAA3NwAAAAAABPsQgBj4-EGE32OUpUFR8ipqZQzynXt_gAPBhU/6/KcAOvp1ftSvIZrOqA4L7cQ/aHR0cHM6Ly90aWtpLnZuL3NlcC9ob21l&amp;source=gmail&amp;ust=1683298949669000&amp;usg=AOvVaw3M7TSQRI4PWecuygOsG51X">
                            <img src="https://ci3.googleusercontent.com/proxy/hzh2_D8PnxbNuz83P2hqu7idL2qy94GqnqYXp-UQ5xdYKBQGrnUeN5AydFuxmzUSieep9ZdwYRsfbt6zuNF1thYiOgnqMceKMfO7i1EpfFAgpfDdRQqefoOXJCePZ4ryZpUX=s0-d-e1-ft#https://salt.tikicdn.com/ts/upload/5e/82/5c/882d4c145fcc70bd1881b84e8684f8cf.png"
                                alt="banner" width="100%" class="CToWUd" data-bit="iit">
                        </a>
                    </td>
                </tr> --}}
                {{-- <tr>
                    <td>&nbsp;
                        <p
                            style="margin:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal">
                            Trường hợp quý khách có những băn khoăn về đơn hàng, có thể xem thêm mục <a
                                href="https://x64km.mjt.lu/lnk/EAAAA8YY3CIAAAAKFZgAAJSoWj0AAAAA3NwAAAAAABPsQgBj4-EGE32OUpUFR8ipqZQzynXt_gAPBhU/7/FOlj8eonsyTV0nJCskCzjg/aHR0cDovL2hvdHJvLnRpa2kudm4vaGMvdmkvP3V0bV9zb3VyY2U9dHJhbnNhY3Rpb25hbCtlbWFpbCZ1dG1fbWVkaXVtPWVtYWlsJnV0bV90ZXJtPWxvZ28mdXRtX2NhbXBhaWduPW5ldytvcmRlcg"
                                title="Các câu hỏi thường gặp" target="_blank"
                                data-saferedirecturl="https://www.google.com/url?q=https://x64km.mjt.lu/lnk/EAAAA8YY3CIAAAAKFZgAAJSoWj0AAAAA3NwAAAAAABPsQgBj4-EGE32OUpUFR8ipqZQzynXt_gAPBhU/7/FOlj8eonsyTV0nJCskCzjg/aHR0cDovL2hvdHJvLnRpa2kudm4vaGMvdmkvP3V0bV9zb3VyY2U9dHJhbnNhY3Rpb25hbCtlbWFpbCZ1dG1fbWVkaXVtPWVtYWlsJnV0bV90ZXJtPWxvZ28mdXRtX2NhbXBhaWduPW5ldytvcmRlcg&amp;source=gmail&amp;ust=1683298949669000&amp;usg=AOvVaw2CDTPAGMBDkBApANIeeksA">
                                <strong>các câu hỏi thường gặp</strong>.</a></p>

                        <p
                            style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal;border:1px #14ade5 dashed;padding:5px;list-style-type:none">
                            Từ ngày 14/2/2015, <span class="il">Tiki</span> sẽ không gởi tin nhắn SMS khi đơn hàng
                            của bạn được xác nhận thành công. Chúng tôi chỉ liên hệ trong trường hợp đơn hàng có thể bị
                            trễ hoặc không liên hệ giao hàng được.</p>

                        <p
                            style="margin:10px 0 0 0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal">
                            Mọi thắc mắc và góp ý, quý khách vui lòng liên hệ với <span class="il">Tiki</span> Care
                            qua <a
                                href="https://x64km.mjt.lu/lnk/EAAAA8YY3CIAAAAKFZgAAJSoWj0AAAAA3NwAAAAAABPsQgBj4-EGE32OUpUFR8ipqZQzynXt_gAPBhU/8/0v1EHqFzm7DoTBa2CHlJWg/aHR0cHM6Ly9ob3Ryby50aWtpLnZuL2hjL3Zp"
                                target="_blank"
                                data-saferedirecturl="https://www.google.com/url?q=https://x64km.mjt.lu/lnk/EAAAA8YY3CIAAAAKFZgAAJSoWj0AAAAA3NwAAAAAABPsQgBj4-EGE32OUpUFR8ipqZQzynXt_gAPBhU/8/0v1EHqFzm7DoTBa2CHlJWg/aHR0cHM6Ly9ob3Ryby50aWtpLnZuL2hjL3Zp&amp;source=gmail&amp;ust=1683298949669000&amp;usg=AOvVaw2iYTlc0MZ2j-G_UHcfKAaq">https://hotro.<span
                                    class="il">tiki</span>.vn/hc/vi</a>. Đội ngũ <span class="il">Tiki</span>
                            Care luôn sẵn sàng hỗ trợ bạn.</p>
                    </td>
                </tr> --}}
                <tr>
                    <td>&nbsp;
                        <p><span class="il">Nhật Store</span> cảm ơn quý khách.</p>

                        <p><strong><a
                                    {{-- href="https://x64km.mjt.lu/lnk/EAAAA8YY3CIAAAAKFZgAAJSoWj0AAAAA3NwAAAAAABPsQgBj4-EGE32OUpUFR8ipqZQzynXt_gAPBhU/9/Oz6eHRBxY-l-V5QD_zJZQg/aHR0cDovL3Rpa2kudm4_dXRtX3NvdXJjZT10cmFuc2FjdGlvbmFsK2VtYWlsJnV0bV9tZWRpdW09ZW1haWwmdXRtX3Rlcm09bG9nbyZ1dG1fY2FtcGFpZ249bmV3K29yZGVy" --}}
                                    style="color:#00a3dd;text-decoration:none;font-size:14px" target="_blank"
                                    data-saferedirecturl="https://www.google.com/url?q=https://x64km.mjt.lu/lnk/EAAAA8YY3CIAAAAKFZgAAJSoWj0AAAAA3NwAAAAAABPsQgBj4-EGE32OUpUFR8ipqZQzynXt_gAPBhU/9/Oz6eHRBxY-l-V5QD_zJZQg/aHR0cDovL3Rpa2kudm4_dXRtX3NvdXJjZT10cmFuc2FjdGlvbmFsK2VtYWlsJnV0bV9tZWRpdW09ZW1haWwmdXRtX3Rlcm09bG9nbyZ1dG1fY2FtcGFpZ249bmV3K29yZGVy&amp;source=gmail&amp;ust=1683298949669000&amp;usg=AOvVaw0cACgAM2RvkAveiBp9nyma"><span
                                        class="il">Nhật Store</span></a> </strong></p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
