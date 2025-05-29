<x-app-layout>

    <x-slot name="header">
        <script>
            (g => {
                var h, a, k, p = "The Google Maps JavaScript API",
                    c = "google",
                    l = "importLibrary",
                    q = "__ib__",
                    m = document,
                    b = window;
                b = b[c] || (b[c] = {});
                var d = b.maps || (b.maps = {}),
                    r = new Set,
                    e = new URLSearchParams,
                    u = () => h || (h = new Promise(async (f, n) => {
                        await (a = m.createElement("script"));
                        e.set("libraries", [...r] + "");
                        for (k in g) e.set(k.replace(/[A-Z]/g, t => "_" + t[0].toLowerCase()), g[k]);
                        e.set("callback", c + ".maps." + q);
                        a.src = `https://maps.${c}apis.com/maps/api/js?` + e;
                        d[q] = f;
                        a.onerror = () => h = n(Error(p + " could not load."));
                        a.nonce = m.querySelector("script[nonce]")?.nonce || "";
                        m.head.append(a)
                    }));
                d[l] ? console.warn(p + " only loads once. Ignoring:", g) : d[l] = (f, ...n) => r.add(f) && u().then(() => d[l](f, ...n))
            })({
                key: "{{ $APIkey }}",
                v: "weekly",
            });
        </script>
    </x-slot>

    <body>
        <h1 class="title">
            {{ $post->title }}
        </h1>
        <div class="content">
            <div class="content__post">
                <h3>場所</h3>
                <p>{{ $post->spot_name }}</p>
                <p>{{ $post->address}}</p>
            </div>
            <div>
                <h3>画像</h3>
                <img src="{{ $post->image_url }}" alt="画像が読み込めません。">
            </div>
            <div id="map" style="width: 100%; height: 400px;"></div>
        </div>

        <div class="edit"><a href="/posts/{{ $post->id }}/edit">edit</a></div>




        <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
            @csrf
            @method('DELETE')
            <button type="button" onclick="deletePost({{ $post->id }})">delete</button>
        </form>
        <script>
            function deletePost(id) {
                'use strict'

                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>





        <div class="footer">
            <a href="/">戻る</a>
        </div>
        <script>
            const lat = Number("{{ $post->latitude }}");
            const lng = Number("{{ $post->longitude }}");
            // Google Maps モジュールを読み込んでマップ＆マーカーを描画



            let mapObj;
            let marker;
            async function initMap() {
                const {
                    Map
                } = await google.maps.importLibrary("maps");
                const forcus = {
                    lat,
                    lng
                };
                const mapElement = document.getElementById("map");
                const opt = {
                    center: forcus,
                    zoom: 14,
                    mapId: 'DEMO_MAP_ID'
                };
                // 地図のインスタンスを作成（第一引数にはマップを描画する領域、第二引数にはオプションを指定）
                mapObj = new Map(mapElement, opt);
                const {
                    AdvancedMarkerElement
                } = await google.maps.importLibrary("marker");
                const MarkerView = new AdvancedMarkerElement({
                    map: mapObj,
                    position: forcus
                });
            }
            initMap();
        </script>
    </body>
</x-app-layout>