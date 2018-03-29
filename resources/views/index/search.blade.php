@extends('layouts.app')
@section('content')
<header class="comhead">
    <a href="javascript:history.back();" class="back"></a>
    <a onclick="$('#search_form').submit()" class="a1">确定</a>
    <div class="box01 box02">
        <form action="{{ url()->current() }}" id="search_form">
            <input type="submit" value=" " class="sub" />
            <input type="search" id="keywords" name="keywords" value="{{ $keywords }}" class="text" placeholder="输入关键词" />
        </form>
    </div>
</header>
<div class="comheadbg"></div>

@if($keywords)

    @if(count($books))
        <div class="w100 whitebg oh">
            @foreach ($books as $book)
                <a class="prolist" href="{{ route('books.show', $book->id) }}">
                    <div class="box">
                        <i style="background-image: url({{ $book->image }})"></i>
                        <p class="p1">{{ $book->name }}</p>
                        <p class="p2">{{ $book->author }}<span>{{ $book->press }}</span></p>
                        <p class="p3">￥{{ $book->price }}<span>￥{{ $book->original_price }}</span></p>
                        <p class="p4">
                            <span class="sp1">{{ $book->published_at }}年出版</span><span class="sp2">{{ $book->used_format }}</span>
                        </p>
                    </div>
                </a>
            @endforeach
        </div>
        <p class="search_end"><span>已展示所有结果</span></p>
        @if(!Request::has('is_all'))
        <p class="" style="text-align: center; font-size: 0.24rem;">您可以：<a href="{{ Request::fullUrl() }}&is_all=1" style="font-size: 0.24rem; color: #0d6aad;">查看所有学校结果</a></p>
        @endif
    @else
        <p class="search_end"><span>暂无结果</span></p>
    @endif

@else


        <h2 class="search_story">搜索历史</h2>
        @if($searches)
        @foreach ($searches as $search)
            <p class="search_resurt"><a href="{{ url()->current() }}?keywords={{ $search->keywords }}">{{ $search->keywords }}</a><span style="color: #999;">{{ $search->created_at->diffForHumans() }}</span></p>
        @endforeach
            @else
            <p class="search_end"><span>暂无记录</span></p>
        @endif


@endif


<div style="text-align: center; margin-top: 0.5rem;">
<svg width="130" height="18" viewBox="0 0 130 18" xmlns="http://www.w3.org/2000/svg"><defs><linearGradient x1="-37.75%" y1="134.936%" x2="130.239%" y2="-27.7%" id="a"><stop stop-color="#00AEFF" offset="0%"/><stop stop-color="#3369E7" offset="100%"/></linearGradient></defs><g fill="none" fill-rule="evenodd" opacity=".75"><path d="M59.4.022h13.3c1.308 0 2.376 1.057 2.376 2.364V15.62c0 1.302-1.063 2.364-2.377 2.364H59.4c-1.31 0-2.378-1.057-2.378-2.364V2.38c0-1.3 1.063-2.358 2.377-2.358z" fill="url(#a)"/><path d="M66.257 4.56c-2.815 0-5.1 2.272-5.1 5.078 0 2.806 2.285 5.072 5.1 5.072 2.815 0 5.1-2.272 5.1-5.078 0-2.805-2.28-5.072-5.1-5.072zm0 8.652c-1.983 0-3.593-1.602-3.593-3.574 0-1.972 1.61-3.574 3.593-3.574 1.983 0 3.593 1.602 3.593 3.574 0 1.972-1.605 3.574-3.593 3.574zm0-6.418v2.664c0 .076.082.13.153.093l2.378-1.225c.054-.027.07-.093.043-.147-.492-.86-1.406-1.45-2.463-1.488-.055 0-.11.044-.11.104zm-3.33-1.956l-.313-.31c-.306-.306-.8-.306-1.106 0l-.372.37c-.307.305-.307.795 0 1.1l.306.306c.05.05.12.038.165-.01.18-.247.378-.48.597-.7.224-.222.454-.418.706-.598.055-.033.06-.11.017-.158zm5-.806v-.616c0-.43-.35-.78-.783-.78H65.32c-.432 0-.783.35-.783.78v.632c0 .07.066.12.137.103.51-.146 1.046-.222 1.588-.222.52 0 1.036.07 1.534.207.066.016.132-.033.132-.103z" fill="#FFF"/><path d="M102.162 13.762c0 1.455-.372 2.517-1.123 3.193-.75.675-1.896 1.013-3.44 1.013-.565 0-1.737-.11-2.674-.316l.345-1.69c.785.165 1.82.208 2.362.208.86 0 1.474-.174 1.84-.523.368-.35.548-.866.548-1.553v-.348c-.213.103-.493.207-.838.316-.345.103-.745.158-1.194.158-.59 0-1.128-.093-1.616-.278-.487-.185-.91-.458-1.254-.817-.345-.36-.62-.812-.81-1.352-.192-.54-.29-1.503-.29-2.212 0-.663.103-1.497.306-2.052.208-.556.504-1.036.904-1.433.394-.398.876-.703 1.44-.927.564-.223 1.227-.365 1.945-.365.695 0 1.336.088 1.96.19.625.105 1.156.214 1.59.333v8.456zm-5.954-4.206c0 .894.197 1.885.592 2.3.394.413.903.62 1.528.62.34 0 .663-.05.964-.14.3-.094.542-.203.734-.334v-5.29c-.153-.033-.794-.163-1.413-.18-.778-.02-1.37.295-1.786.8-.41.508-.62 1.396-.62 2.224zm16.12 0c0 .72-.104 1.264-.317 1.858-.213.594-.514 1.1-.903 1.52-.39.42-.855.746-1.402.975-.548.228-1.392.36-1.813.36-.422-.007-1.26-.127-1.802-.36-.543-.235-1.008-.557-1.397-.976-.39-.42-.69-.926-.91-1.52-.22-.594-.328-1.14-.328-1.858 0-.72.098-1.41.318-2 .22-.588.525-1.09.92-1.51.394-.418.865-.74 1.402-.968.542-.23 1.14-.338 1.786-.338.647 0 1.244.114 1.792.338.548.228 1.02.55 1.402.97.39.42.69.92.91 1.51.23.587.344 1.28.344 1.998zm-2.19.005c0-.92-.203-1.687-.598-2.22-.394-.54-.947-.808-1.654-.808-.706 0-1.26.267-1.654.807-.394.538-.586 1.3-.586 2.22 0 .933.197 1.56.59 2.1.396.544.95.81 1.656.81s1.26-.272 1.654-.81c.394-.546.59-1.167.59-2.1zm6.96 4.71c-3.51.015-3.51-2.823-3.51-3.276L113.583.926l2.14-.338V10.59c0 .257 0 1.88 1.376 1.886v1.793zm3.775 0h-2.152V5.07l2.153-.338v9.535zm-1.08-10.543c.72 0 1.305-.578 1.305-1.292 0-.713-.58-1.29-1.304-1.29-.723 0-1.303.577-1.303 1.29 0 .714.587 1.292 1.304 1.292zm6.432 1.013c.706 0 1.304.087 1.786.26.483.176.87.42 1.156.73.285.312.488.737.608 1.184.126.446.187.937.187 1.476v5.48c-.328.072-.827.154-1.495.252-.668.098-1.418.147-2.25.147-.554 0-1.064-.056-1.518-.16-.46-.103-.85-.272-1.178-.506-.324-.234-.576-.534-.762-.904-.18-.37-.274-.894-.274-1.44 0-.522.104-.854.306-1.214.21-.36.488-.653.84-.882.355-.23.76-.392 1.225-.49.466-.1.954-.148 1.458-.148.235 0 .482.017.744.044.263.027.537.076.833.147v-.35c0-.244-.027-.478-.088-.696-.06-.222-.164-.413-.306-.582-.148-.17-.34-.3-.58-.392-.242-.093-.55-.164-.916-.164-.493 0-.942.06-1.353.13-.41.072-.75.154-1.008.246l-.258-1.75c.268-.09.668-.184 1.183-.276.515-.093 1.068-.142 1.66-.142zm.18 7.73c.658 0 1.145-.037 1.485-.103V10.2c-.12-.034-.29-.072-.515-.105-.224-.032-.47-.054-.745-.054-.235 0-.476.017-.717.055-.24.033-.46.098-.652.19-.19.094-.35.224-.465.393-.12.17-.175.267-.175.523 0 .503.175.79.493.982.323.196.75.29 1.293.29zM84.11 4.795c.707 0 1.304.088 1.786.262.482.174.87.42 1.156.73.29.316.487.735.608 1.182.126.447.186.937.186 1.477v5.48c-.33.07-.827.153-1.495.25-.67.1-1.42.148-2.253.148-.553 0-1.062-.054-1.517-.158-.46-.103-.85-.272-1.178-.506-.323-.236-.575-.535-.76-.906-.182-.37-.275-.893-.275-1.438 0-.523.104-.856.307-1.215.208-.36.487-.653.838-.882.356-.23.76-.392 1.227-.49.464-.098.952-.147 1.456-.147.235 0 .482.017.745.044.258.028.538.077.833.148v-.35c0-.244-.027-.48-.087-.697-.06-.223-.165-.414-.307-.582-.15-.17-.34-.3-.582-.393-.24-.092-.547-.163-.914-.163-.493 0-.942.06-1.353.13-.41.07-.75.153-1.007.246l-.258-1.75c.27-.092.67-.184 1.184-.277.513-.098 1.067-.142 1.658-.142zm.186 7.737c.658 0 1.145-.037 1.485-.103V10.26c-.122-.034-.29-.072-.516-.105-.225-.032-.47-.054-.745-.054-.236 0-.477.017-.72.055-.24.033-.46.098-.65.19-.192.094-.35.224-.466.393-.12.17-.175.267-.175.523 0 .503.174.79.492.982.317.19.75.29 1.292.29zm8.682 1.74c-3.51.015-3.51-2.823-3.51-3.276L89.46.926 91.6.588V10.59c0 .257 0 1.88 1.376 1.886v1.793z" fill="#182359"/><path d="M5.564 11.868c0 .698-.252 1.246-.757 1.643-.505.4-1.2.597-2.09.597-.887 0-1.614-.137-2.18-.413V12.48c.358.168.74.3 1.14.397.404.097.78.145 1.127.145.508 0 .883-.096 1.125-.29.24-.193.362-.453.362-.778 0-.294-.11-.543-.334-.747-.222-.204-.68-.446-1.375-.725-.716-.29-1.22-.62-1.514-.994-.295-.372-.442-.82-.442-1.342 0-.656.233-1.17.7-1.547.464-.377 1.09-.565 1.873-.565.753 0 1.5.164 2.246.494l-.408 1.046c-.698-.293-1.32-.44-1.87-.44-.414 0-.73.09-.944.27-.215.182-.323.42-.323.718 0 .204.044.38.13.524.086.145.228.282.425.41.197.13.55.3 1.063.51.577.24 1 .465 1.268.672.268.208.465.442.59.704.126.26.188.57.188.924zm3.98 2.24c-.923 0-1.646-.27-2.167-.81-.52-.538-.78-1.28-.78-2.225 0-.97.24-1.733.724-2.288.484-.555 1.148-.833 1.993-.833.785 0 1.404.238 1.86.715.454.476.68 1.13.68 1.965v.682H7.897c.017.577.173 1.02.467 1.33.293.31.707.464 1.24.464.35 0 .678-.033.98-.1.303-.065.628-.175.976-.33v1.027c-.31.146-.62.25-.936.31-.315.062-.675.092-1.08.092zm-.23-5.2c-.402 0-.723.127-.965.382-.242.254-.386.624-.433 1.11h2.696c-.007-.49-.125-.86-.354-1.113-.23-.253-.545-.38-.947-.38zM17.003 14l-.252-.827h-.043c-.287.362-.575.608-.865.738-.29.132-.663.197-1.117.197-.584 0-1.04-.157-1.367-.472-.327-.315-.49-.76-.49-1.338 0-.612.227-1.074.68-1.385.456-.312 1.15-.482 2.08-.51l1.026-.033v-.318c0-.38-.09-.663-.266-.85-.177-.19-.452-.283-.825-.283-.304 0-.596.044-.875.133-.28.09-.548.195-.806.317l-.408-.902c.322-.17.675-.297 1.058-.384.383-.088.745-.132 1.085-.132.755 0 1.325.165 1.71.494.385.33.577.847.577 1.553v4h-.902zm-1.88-.86c.46 0 .827-.127 1.105-.383.276-.256.415-.615.415-1.077v-.516l-.763.032c-.594.022-1.026.12-1.297.298-.27.178-.405.45-.405.814 0 .265.078.47.236.615.158.145.394.218.71.218zm7.558-5.188c.254 0 .464.018.63.054l-.125 1.176c-.18-.043-.365-.064-.56-.064-.503 0-.913.164-1.226.494-.312.33-.47.757-.47 1.284V14h-1.26V8.06h.987l.167 1.047h.064c.197-.355.454-.636.77-.843.318-.208.66-.312 1.024-.312zm4.125 6.155c-.9 0-1.582-.262-2.05-.786-.466-.524-.7-1.277-.7-2.258 0-1 .245-1.767.733-2.304.49-.537 1.195-.806 2.12-.806.626 0 1.19.117 1.69.35l-.38 1.014c-.534-.207-.974-.31-1.322-.31-1.027 0-1.54.68-1.54 2.045 0 .667.127 1.168.383 1.502.257.335.632.503 1.126.503.562 0 1.094-.14 1.595-.42v1.102c-.224.132-.465.227-.72.284-.257.06-.568.087-.933.087zM35.084 14h-1.268v-3.652c0-.46-.092-.8-.276-1.026-.185-.226-.477-.34-.878-.34-.53 0-.92.16-1.17.477-.247.316-.372.846-.372 1.59V14h-1.262V5.643h1.262v2.12c0 .34-.02.705-.064 1.09h.08c.172-.285.41-.507.717-.665.306-.157.664-.236 1.072-.236 1.44 0 2.16.725 2.16 2.175V14zm7.648-6.048c.742 0 1.32.27 1.733.806.413.537.62 1.29.62 2.26 0 .975-.21 1.733-.628 2.276-.42.542-1 .813-1.746.813-.75 0-1.335-.27-1.75-.81h-.086l-.23.703h-.946V5.643h1.262V7.63c0 .147-.007.365-.022.655-.014.29-.025.475-.032.553h.054c.4-.59.992-.886 1.772-.886zm-.327 1.03c-.51 0-.875.15-1.1.45-.222.3-.338.8-.345 1.5v.087c0 .722.115 1.246.344 1.57.23.324.603.486 1.122.486.448 0 .787-.177 1.018-.532.23-.354.347-.866.347-1.536 0-1.35-.46-2.025-1.385-2.025zm3.244-.922h1.374l1.208 3.367c.183.48.305.93.366 1.354h.043c.033-.196.092-.435.178-.716.086-.28.54-1.616 1.364-4.004h1.364l-2.54 6.73c-.462 1.235-1.232 1.853-2.31 1.853-.28 0-.55-.03-.816-.092v-.998c.19.043.406.065.65.065.61 0 1.036-.353 1.283-1.058l.22-.56-2.384-5.94z" fill="#1D3657"/></g></svg>
</div>
@endsection

@section('script')
    @if(Request::query('focus'))
    <script>
        $(function () {
            $('#keywords').focus();
        })
    </script>
    @endif
@endsection