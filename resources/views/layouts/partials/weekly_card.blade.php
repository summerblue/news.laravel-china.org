<div class="subscribe-box">
    <div class="subscribe-header">

        @if (isset($size) && $size == 'small')
            <h3>
                订阅周刊
                <i class="fa fa-envelope-o pull-right" aria-hidden="true"></i>
            </h3>
        @else
            <h2>
                订阅周刊
                <i class="fa fa-envelope-o pull-right" aria-hidden="true"></i>
            </h2>
        @endif
    </div>
    <div class="subscribe-content">

        @if (isset($size) && $size == 'small')
            <p>每周推送，让你不会错过任何关于 Laravel 的重要信息。</p>
        @else
            <p>每周推送 Laravel 最新资讯、精华文章、开发技巧、推荐扩展包、最新 Laravel 职位信息以及 「Laravel China 社区」上的精华讨论。</p>
        @endif
        <form action="https://laravelnews.createsend.com/t/d/s/owwr/" method="post" class="subscribe-form">

            @if (isset($size) && $size == 'small')
                <div class="input-group" style="width:100%">
                    <input class="form-control" placeholder="Email 地址" id="subscribe-input">
                    <span class="input-group-btn">
                        <button id="subscrib-btn" class="btn btn-danger btn-" type="button">订阅</button>
                    </span>
                </div>
            @else
                <div class="input-group">
                    <input class="form-control" placeholder="Email 地址" id="subscribe-input">
                    <span class="input-group-btn">
                        <button class="btn btn-danger btn-" id="subscrib-btn" type="button">
                            <i class="fa fa-arrow-right" aria-hidden="true"></i> 开始订阅
                        </button>
                    </span>
                </div>
            @endif
        </form>
    </div>
</div>
