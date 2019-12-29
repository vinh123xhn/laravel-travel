<?php

/* --- System group user */
if (!defined('GROUP_ADMIN')) {define('GROUP_ADMIN', 1);}
if (!defined('GROUP_WRITER')) {define('GROUP_WRITER', 2);}

/* --- System active */
if (!defined('ACTIVE_TRUE')) {define('ACTIVE_TRUE', 1);}
if (!defined('ACTIVE_FALSE')) {define('ACTIVE_FALSE', 0);}
if (!defined('EMAIL_TEMPLATE_FORGOT_PASSWORD')) {define('EMAIL_TEMPLATE_FORGOT_PASSWORD', 1);}



if (!defined('SESSION_EXPIRED')) {define('SESSION_EXPIRED', 180);} // Expired in 30 minutes

return [
    'group_user' => [
        1 => 'Admin',
        2 => 'Người viết bài',
        3 => 'Khách',
    ],

    'gender' => [
        1 => 'Nam',
        2 => 'Nữ',
    ],

    'active' => [
        1 => 'Có',
        2 => 'Không',
    ],

    'art_category' => [
        1 => 'Chưa phân loại',
        2 => 'Nhã nhạc cung đinh',
        3 => 'Tuồng cung đình',
        4 => 'Múa hát cung đình',
        5 => 'Ca Huế',
        6 => 'Dân ca Huế',
        7 => 'Ca kịch Huế',
        8 => 'Dân ca, dân nhạc đồng bào các dân tộc miền núi',
        9 => 'Mỹ thuật - Nghệ thuật',
        10 => 'Kiến trúc',
        11 => 'Âm nhạc mới có sử dụng chất liệu ca Huế',
        12 => 'Khác',
    ],
    'costume_category' => [
        1 => 'Trang phục thường ngày',
        2 => 'Trang phục cung đình',
        3 => 'Khác',
    ],
    'cuisine_category' => [
        1 => 'Món ăn',
        2 => 'Thức uống',
    ],
    'festival_category' => [
        1 => 'Dân gian',
        2 => 'Cung đình',
        3 => 'Lịch sử, cách mạng',
        4 => 'Tôn giáo, tín ngưởng',
        5 => 'Văn hóa, thể thao, du lịch (lễ hội mới)',
        6 => 'Khác',
    ],
    'crafts_category' => [
        1 => 'Chưa xác định',
        2 => 'Sơ chế và chế biến nông lâm, thủy hải sản, thực phẩm',
        3 => 'Sản xuất hàng thủ công mỹ nghệ',
        4 => 'Sản xuất cơ khí nhỏ, đúc kim loại, sản xuất đồ ngũ kim, dụng cụ và công cụ phục vụ sản xuất và tiêu dùng',
        5 => 'Khác',
    ],
    'relics_category' => [
        1 => 'Di tích lịch sử: Lưu niệm sự kiện',
        2 => 'Di tích lịch sử: Lưu niệm danh nhân',
        3 => 'Di tích khảo cổ',
        4 => 'Di tích kiến trúc nghệ thuật',
        5 => 'Khác',
    ],
    'religion' => [
        1 => 'Phật giáo',
        2 => 'Công giáo',
        3 => 'Cao Đài',
        4 => 'Hòa Hảo',
        5 => 'Tin Lành',
        6 => 'Hồi giáo',
        7 => 'Ấn Độ giáo',
        8 => 'Không',
    ],
    'ethnic_groups' => [
        1 => 'Kinh (Việt)',
        2 => 'Chứt',
        3 => 'Mường',
        4 => 'Thổ',
        5 => 'Bố Y',
        6 => 'Giáy',
        7 => 'Lào',
        8 => 'Lự',
        9 => 'Nùng',
        10 => 'Sán Chay',
        11 => 'Tày',
        12 => 'Thái',
        13 => 'Cờ Lao',
        14 => 'La Chí',
        15 => 'La Ha',
        16 => 'Pu Péo',
        17 => 'Ba Na',
        18 => 'Brâu',
        19 => 'Bru - Vân Kiều',
        20 => 'Chơ Ro',
        21 => 'Co',
        22 => 'Cơ Ho',
        23 => 'Cơ Tu',
        24 => 'Giẻ Triêng',
        25 => "Hrê",
        26 => 'Kháng',
        27 => 'Khơ Me',
        28 => 'Khơ Mú',
        29 => 'Mạ',
        30 => 'Mảng',
        31 => 'M’Nông',
        32 => 'Ơ Đu',
        33 => 'Rơ Măm',
        34 => 'Tà Ôi',
        35 => 'Xinh Mun',
        36 => "Xơ Đăng",
        37 => 'X’Tiêng',
        38 => 'Dao',
        39 => 'H’Mông',
        40 => 'Pà Thẻn',
        41 => 'Chăm',
        42 => 'Chu Ru',
        43 => 'Ê Đê',
        44 => 'Gia Rai',
        45 => 'Ra Glai',
        46 => 'Hoa',
        47 => 'Ngái',
        48 => 'Sán Dìu',
        49 => 'Cống',
        50 => 'Hà Nhì',
        51 => 'La Hủ',
        52 => 'Lô Lô',
        53 => 'Phù Lá',
        54 => 'Si La',
    ],

    'relics_level' => [
        1 => 'Cấp quốc gia đặc biệt',
        2 => 'Cấp quốc gia',
        3 => 'Cấp tỉnh',
    ],

    'organizational_level' => [
        1 => 'Cấp quốc gia ',
        2 => 'Cấp tỉnh',
    ],

    'festival_level' => [
        1 => 'Cấp quốc gia ',
        2 => 'Cấp tỉnh',
        3 => 'Cấp huyện',
        4 => 'Cấp xã',
        5 => 'Khác',
    ],

    'calendar_type' => [
        1 => 'Dương lịch',
        2 => 'Âm lịch',
    ],

    'day' => [
        1 => 'Cố định',
        2 => 'Không cố định',
    ],

    'festival_type' => [
        1 => 'Cung đình',
        2 => 'Dân gian',
        3 => 'Tôn giáo, tín ngưởng',
        4 => 'Khác',
    ],

    'art_level_1' => [
        1 => 'Âm nhạc cung đình - Vũ nhạc',
        2 => 'Âm nhạc cung đình - Nhã nhạc cung đình',
        3 => 'Âm nhạc cung đình - Nhạc tuồng',
        4 => 'Sân khấu - Điệu múa',
        5 => 'Chưa xác định',
    ],

    'art_level_2' => [
        1 => 'Nhã nhạc cung đình - Đại nhạc',
        2 => 'Chưa xác định',
    ],

    'festival_status' => [
        1 => 'Đang phát triển',
        2 => 'Nguy cơ mai một',
    ],

    'festival_characteristics' => [
        1 => 'Có tục hèm',
        2 => 'Có tế',
        3 => 'Có rước',
        4 => 'Có chương trình văn nghệ (ca múa nhạc, thơ...), thể thao (đua thuyền, xe...)',
        5 => 'Có lễ vật đặc biệt',
        7 => 'Có đình (đền)',
        8 => 'Diễu hành xe hoa, treo đèn, thả hoa đăng',
        9 => 'Có trò chơi dân gian',
        10 => 'Có đình (đền)',
        11 => 'Có đọc sớ',
        12 => 'Khác',
    ],

    'art_status' => [
        1 => 'Được bảo tồn, phát huy',
        2 => 'Đang phục dựng',
        3 => 'Chưa có thông tin',
    ],

    'relics_status' => [
        1 => 'Đã được tôn tạo, tu bổ',
        2 => 'Đã xuống cấp',
        3 => 'Còn nguyên trạng',
        4 => 'Có nguy cơ biến mất',
    ],

    'crafts_type' => [
        1 => 'Sản xuất hàng thủ công mỹ nghệ',
        2 => 'Sản xuất cơ khí nhỏ, đúc kim loại, sản xuất đồ ngũ kim, dụng cụ và công cụ phục vụ sản xuất và tiêu dùng',
        3 => 'Sơ chế và chế biến nông lâm, thủy hải sản, thực phẩm. ',
        4 => 'Chưa xác định',
    ],

    'crafts_village_or_work' => [
        1 => 'Làng nghề',
        2 => 'Nghề',
    ],

    'crafts_village_type' => [
        1 => 'Làng nghề truyền thống',
        2 => 'Làng nghề tiểu thủ công nghiệp',
        3 => 'Khác'
    ],

    'crafts_qualification' => [
        1 => 'Đơn giản',
        2 => 'Phức tạp',
    ],

    'crafts_status' => [
        1 => 'Phát triển',
        2 => 'Bình thường',
        3 => 'Thất truyền',
    ],

    'crafts_number_of' => [
        1 => 'Nhỏ hơn 30 hộ/100 người lao động làm nghề',
        2 => 'Từ 30-49 hộ/100 người lao động làm nghề',
        3 => 'Từ 50-79 hộ/100 người lao động làm nghề',
        4 => 'Từ 80 hộ/100 người lao động làm nghề trở lên',
        5 => 'Khác',
    ],

    'crafts_concrete' => [
        1 => 'Sơn mài',
        2 => 'Thêu, đan',
        3 => 'Dệt',
        4 => 'Tranh, giấy thủ công',
        5 => 'Nón lá',
        6 => 'Chạm khắc đá',
        7 => 'Sản xuất vật liệu xây dựng (gạch, ngói...)',
        8 => 'Kim khí (đúc đồng, rèn…)',
        9 => 'Mộc mỹ nghệ, điêu khắc',
        10 => 'Đan lát (rổ rá, đệm bàng...)',
        11 => 'Chế biến nông lâm thủy hải sản, thực phẩm (kẹo, bún, bánh, tôm cá...)',
        12 => 'Chưa xác định',
        13 => 'Khác',
    ],

    'costume_material' => [
        1 => 'nguyên liệu có xuất xứ từ các cây trồng có sẵn trong rừng',
        2 => 'bông, đay, vỏ cây',
        3 => 'lá cọ, lá buông, thân cây lồ ô, cây mung',
    ],

    'costume_status' => [
        1 => 'Không còn sử dụng',
        2 => 'Đang sử dụng',
        3 => 'Ít sử dụng',
    ],

    'costume_purpose' => [
        1 => 'Dịp lễ (Tết, ngày hội...)',
        2 => 'Thường ngày',
        3 => 'Dùng trong cung đình - Thiết đãi triều',
        4 => 'Dùng trong cung đình - Thiết thường triều',
        5 => 'Dùng trong cung đình - Tế giao',
    ],

    'cuisine_taste' => [
        1 => 'Chua',
        2 => 'Mặn',
        3 => 'Ngọt',
        4 => 'Cay',
        5 => 'Không vị',
    ],

    'cuisine_type' => [
        1 => 'Dân gian',
        2 => 'Cung đình',
    ],

    'cuisine_kind_of_dish' => [
        1 => 'Chính',
        2 => 'Tráng miệng',
        3 => 'Phụ',
    ],

    'cuisine_health' => [
        1 => 'Bình thường',
        2 => 'Đặc biệt',
    ],

    'cuisine_season' => [
        1 => 'Có',
        2 => 'Không',
    ],

    'cuisine_ingredient' => [
        1 => 'Tại địa phương',
        2 => 'Địa phương khác',
    ],

    'cuisine_place' => [
        1 => 'Rộng rãi',
        2 => 'Trong gia đình',
        3 => 'Khác',
    ],

    'cuisine_use' => [
        1 => 'Phổ biến trong đời sống',
        2 => 'Đặc biệt',
        3 => 'Dip đặc biệt (Lễ, giỗ...',
        4 => 'Chưa xác định',
    ],

    'tourist_accommodation_type' => [
        1 => 'Khách sạn',
        2 => 'Homestay',
        3 => 'Biệt thự du lịch',
        4 => 'Căn hộ du lịch',
        5 => 'Tầu thủy lưu trú du lịch',
        6 => 'Nhà nghỉ du lịch',
        7 => 'Chưa xếp hạng',
    ],
    'tourist_type' => [
            1 => 'Khách du lịch nội địa',
            2 => 'Khách quốc tế'
    ],
];

