<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - Gudang Bahan Baku</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: Georgia, 'Times New Roman', serif;
            background: #FAF7EC;
            color: #2B2B2B;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        a { color: inherit; }
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
            padding: 16px 24px;
            border-bottom: 1px solid #D9D3BF;
        }
        .navbar .brand { font-weight: bold; text-decoration: none; }
        .navbar nav { display: flex; gap: 20px; }
        .navbar nav a { text-decoration: none; padding-bottom: 2px; }
        .navbar nav a.aktif { border-bottom: 1px solid #2B2B2B; }
        main { flex: 1; width: 100%; max-width: 760px; margin: 0 auto; padding: 32px 24px; }
        h1 { font-size: 1.6rem; margin-bottom: 8px; }
        p { line-height: 1.6; margin-bottom: 16px; }
        .tombol {
            display: inline-block;
            background: #2B2B2B;
            color: #FAF7EC;
            border: 1px solid #2B2B2B;
            padding: 10px 20px;
            font-family: inherit;
            font-size: 1rem;
            text-decoration: none;
            cursor: pointer;
        }
        label { display: block; margin-bottom: 6px; }
        input[type=text], input[type=password] {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            background: #FFFFFF;
            border: 1px solid #D9D3BF;
            font-family: inherit;
            font-size: 1rem;
        }
        .galat { margin-bottom: 12px; font-size: 0.9rem; }
        .tabel-bungkus { overflow-x: auto; margin-top: 20px; }
        table { width: 100%; border-collapse: collapse; background: #FFFFFF; }
        th, td { text-align: left; padding: 12px 14px; border: 1px solid #D9D3BF; }
        th { background: #F1ECDA; }
        .kartu { background: #FFFFFF; border: 1px solid #D9D3BF; padding: 24px; margin-top: 20px; }
        .kartu dl { display: grid; grid-template-columns: 140px 1fr; row-gap: 12px; }
        .kartu dt { color: #6B6558; }
        footer { padding: 16px 24px; border-top: 1px solid #D9D3BF; text-align: center; font-size: 0.9rem; color: #6B6558; }
    </style>
</head>
<body>
    @hasSection('tanpa_navbar')
    @else
        <x-navbar :username="$username ?? 'Tamu'" />
    @endif

    <main>
        @yield('content')
    </main>

    @include('components.footer')
</body>
</html>
