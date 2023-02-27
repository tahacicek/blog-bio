<x-app-layout>
    @vite(['resources/css/post.css', 'resources/js/post.js'])
    @push('style')
        <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">
        <style>
            .col-1 {
                width: calc(8.33333%*1);
            }

            .col-2 {
                width: calc(8.33333%*2);
            }

            .col-3 {
                width: calc(8.33333%*3);
            }

            .col-4 {
                width: calc(8.33333%*4);
            }

            .col-5 {
                width: calc(8.33333%*5);
            }

            .col-6 {
                width: calc(8.33333%*6);
            }

            .col-7 {
                width: calc(8.33333%*7);
            }

            .col-8 {
                width: calc(8.33333%*8);
            }

            .col-9 {
                width: calc(8.33333%*9);
            }

            .col-10 {
                width: calc(8.33333%*10);
            }

            .col-11 {
                width: calc(8.33333%*11);
            }

            .col-12 {
                width: calc(8.33333%*12);
            }

            .row {
                display: flex;
                flex-direction: row;
                justify-content: space-between;
                width: 100%;
            }

            .row [class*="col-"] {
                box-sizing: border-box;
                margin: 0 0;
                padding: 0.3rem;
            }



            body {
                font-size: 100%;
                background: #fff;
                font-family: 'Open Sans', sans-serif;
                max-width: 60rem;
                border: solid 1px #eee;
                margin: 2em auto;
                box-shadow: 1px 1px 16px rgba(0, 0, 0, 0.3);
                border-radius: 10px;
            }

            h1,
            h2,
            h3,
            h4 {
                font-family: 'Open Sans', sans-serif;
                margin-top: 0;
            }

            h1 {
                font-size: 2.8rem;
                font-weight: 700;
                text-transform: uppercase;
                margin: 0.6em 0;
            }

            h1 span {
                background-color: #ff9f63;
                background: linear-gradient(-85deg, #e26c6c 45%, #ad1283 50%, #7135a5 65%);
                background-clip: text;
                -webkit-background-clip: text;
                text-fill-color: transparent;
                -webkit-text-fill-color: transparent;
                display: block;
            }

            h1 em {
                text-transform: lowercase;
                font-family: 'Averia Serif Libre', cursive;
            }

            h1 em.capitalize {
                text-transform: capitalize;
            }

            h2 {
                font-size: 2.4rem;
            }

            h3 {
                font-size: 2rem;
            }

            h4 {
                font-size: 1.4rem;
            }

            p {
                font-family: 'Averia Serif Libre', cursive;
                font-size: 1.4em;
                line-height: 1.7;
                margin: 0 0 2em;
                color: #888;
                font-weight: 300;
            }

            p:last-child {
                margin-bottom: 0;
            }

            a {
                text-decoration: none;
                color: #7135a5;
                transition: all 0.2s ease-in-out;
            }

            a:hover {
                color: #e26c6c;
            }

            .page-header {
                padding: 3em;
                text-align: center;
                background: #fec;
                border-radius: 10px 10px 0 0;
            }

            .page-header p {
                margin: 0;
                color: #000;
            }

            .wrap {
                margin: 0 auto;
                padding: 0 3rem;
                box-sizing: border-box;
            }

            .page-section {
                padding: 3rem 0;
                border-bottom: solid 1px #eee;
            }

            .page-section:last-child {
                border-bottom: none;
            }

            .banner {
                min-height: 200px;
                position: relative;
            }

            .banner figure {
                height: 200px;
                overflow: hidden;
                margin: 0 auto;
                box-sizing: border-box;
                padding: 0 0 0 2em;
                width: 200px;
            }

            .banner figure svg {
                height: 100%;
                width: auto;
            }

            .banner figure svg .st0 {
                fill: #7135a5;
            }

            .banner figure svg .st1 {
                fill: #A864BC;
            }

            .share {
                background: #fbfbfb;
                text-align: center;
                position: sticky;
                position: -webkit-sticky;
                top: 0;
                padding: 1rem 3rem;
                font-size: 1.1rem;
                z-index: 10;
            }

            .share ul {
                padding: 0;
                margin: 0;
                list-style: none;
            }

            .share ul li {
                display: inline-block;
                padding: 0 10px 0 0;
            }

            .share ul li a {
                padding: 1em;
                display: inline-block;
            }

            .share ul li a .lnr {
                font-size: 1.6rem;
            }

            .share ul li a.btn .lnr {
                font-size: 1.2rem;
            }

            .post .wrap>p:first-child:first-letter {
                float: left;
                font-size: 5rem;
                line-height: 0.5;
                margin-top: 0.27em;
                padding-right: 5px;
            }

            blockquote {
                border-left: solid 5px #7135a5;
                background: #fed;
                padding: 2em;
                margin-bottom: 2em;
            }

            blockquote p {
                margin: 0;
                color: #7135a5;
            }

            .page-footer {
                padding: 3rem;
                background: #fec;
                border-radius: 0 0 10px 10px;
            }

            .page-footer p {
                font-size: 0.85em;
                display: block;
                padding: 0 20px;
                text-align: center;
                font-family: "Open Sans", sans-serif;
                color: #000;
            }

            .page-footer p strong {
                display: block;
                margin-bottom: 0.8rem;
            }

            .btn {
                display: inline-block;
                border: solid 1px #7135a5;
                padding: 1em 2em;
                border-radius: 2.2em;
                color: #7135a5;
            }

            .btn:hover {
                background: #7135a5;
                color: #fff;
            }

            .section-title {
                text-align: center;
                display: block;
                font-weight: 300;
            }

            .section-title span {
                display: block;
                background-color: #ff9f63;
                background: linear-gradient(-85deg, #e26c6c 45%, #ad1283 50%, #7135a5 65%);
                background-clip: text;
                -webkit-background-clip: text;
                text-fill-color: transparent;
                -webkit-text-fill-color: transparent;
            }

            .related {
                background: #fbfbfb;
            }

            .related article {
                text-align: center;
                box-sizing: border-box;
            }

            .related article .post-wrap {
                border: solid 1px #ddd;
                height: 180px;
                position: relative;
                overflow: hidden;
            }

            .related article .post-wrap figure {
                margin: 0;
                padding: 0;
                position: absolute;
                left: 0;
                right: 0;
                top: 0;
                bottom: 0;
                z-index: 1;
                background: #000;
            }

            .related article .post-wrap figure img {
                width: 120%;
                height: auto;
                opacity: 0.4;
            }

            .related article .post-wrap .post-detail {
                position: absolute;
                z-index: 2;
                padding: 1.3rem;
                left: 0;
                right: 0;
                bottom: 0;
                top: 0;
                color: #fff;
                font-size: 70%;
                transition: all 0.2s ease-in-out;
                background: rgba(0, 0, 0, 0.2);
            }

            .related article .post-wrap .post-detail:hover {
                padding-top: 2.5em;
            }

            .related article .post-wrap .post-detail * {
                transition: all 0.2s ease-in-out;
            }

            .related article .post-wrap .post-detail h3 {
                font-size: 1.4rem;
            }

            .related article .post-wrap .post-detail h3,
            .related article .post-wrap .post-detail p,
            .related article .post-wrap .post-detail a {
                margin: 0.5em;
                color: #fff;
            }
        </style>
    @endpush

    <header class="page-header">
        <div class="banner">
            <img width="500" src="{{ asset($post->cover_image) }}" alt="">
        </div>

        <h1>

          <span><em class="capitalize">The</em> Design</span>
          <span><em>of</em> Everyday</span>
          <span>Things</span>

        </h1>
        <p class="author">
          Don Norman
        </p>
      </header>

      <section class="share flex ">
        <ul class="row">
         <div class="col-md-12">
            <li>
                <a href="#">
                    <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-bookmark" aria-hidden="true"></i>
                </a>
              </li>
              <li>
                 <a href="#">
                    <i class="fa fa-heart" aria-hidden="true"></i>
                  </a>
              </li>

              <li>
                <a href="#" class="btn cta">
                  Buy the book <span class="lnr lnr-cart"></span>
                </a>
              </li>
         </div>
        </ul>
      </section>
      <section class="page-section post">
        <div class="wrap">
          <p>
            Anyone who designs anything to be used by humans -- from physical objects to computer programs to conceptual tools -- must read this book, and it is an equally tremendous read for anyone who has to use anything created by another human. It could forever
            change how you experience and interact with your physical surroundings, open your eyes to the perversity of bad design and the desirability of good design, and raise your expectations about how things should be designed.
          </p>
          <blockquote>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non euismod velit. Vestibulum tristique augue non bibendum ultrices. Praesent vehicula luctus erat ut auctor. Maecenas enim ipsum, mattis eget faucibus sed, euismod eget magna. Duis elementum
          </p>
            </blockquote>
          <p>
            Aenean ut tellus ut odio semper porttitor ac a sapien. Ut ultricies odio non eros auctor tincidunt. Ut a ultricies nunc, a porta urna. Sed augue turpis, sollicitudin vel viverra molestie, gravida et ipsum. Maecenas efficitur iaculis eros sit amet porttitor.
            Cras vitae massa justo. Integer nulla ligula, fermentum at interdum ac, porta et mi.
          </p>
          <p>
            Sed pharetra orci eu felis vulputate ullamcorper. Fusce aliquam varius tempor. Proin non varius tortor, vitae euismod elit. Vivamus facilisis tellus eu luctus fringilla. Sed sed risus erat. In risus lorem, commodo sit amet accumsan in, auctor quis neque.
            Ut nec ipsum ac eros luctus vehicula. In efficitur eros id ultrices molestie. Integer semper, velit eu aliquam blandit, mauris dui lacinia urna, at tempus urna dui vitae turpis.
          </p>

        </div>
      </section>
      <section class="page-section related">
        <h2 class="section-title">
          <span>The Grid</span>
        </h2>
        <div class="wrap row">
          <article class="col-6">
            <div class="post-wrap">
                <figure class="feature-image">
                  <img src="https://c6.staticflickr.com/8/7414/13947832357_3bc63f7a3c.jpg" alt="" />
                </figure>
                <div class="post-detail">
                <h3>
                     <a href="#">
                       All the light we cannot see
                    </a>
                </h3>
              <p><em>by</em> Anthony Doerr</p>
                  </div>
            </div>
          </article>
          <article class="col-6">
            <div class="post-wrap">
            <figure class="feature-image">
                  <img src="https://c8.staticflickr.com/6/5472/10745290383_97eb4c6544.jpg" alt="" />
                </figure>
                <div class="post-detail">
                <h3>
                     <a href="#">
                       All the light we cannot see
                    </a>
                </h3>
              <p><em>by</em> Anthony Doerr</p>
                  </div>
            </div>
          </article>
        </div>

         <div class="wrap row">
          <article class="col-4">
             <div class="post-wrap">
            <figure class="feature-image">
                  <img src="https://c4.staticflickr.com/8/7003/6798701043_2f5e28b0ed.jpg" alt="" />
                </figure>
                <div class="post-detail">
                <h3>
                     <a href="#">
                       All the light we cannot see
                    </a>
                </h3>
              <p><em>by</em> Anthony Doerr</p>
                  </div>
            </div>
           </article>
          <article class="col-4">
             <div class="post-wrap">
            <figure class="feature-image">
                  <img src="https://c8.staticflickr.com/6/5472/10745290383_97eb4c6544.jpg" alt="" />
                </figure>
                <div class="post-detail">
                <h3>
                     <a href="#">
                       A walk in the woods
                    </a>
                </h3>
              <p><em>by</em> Bill Bryson</p>
                  </div>
            </div>
           </article>
          <article class="col-4">
             <div class="post-wrap">
            <figure class="feature-image">
                  <img src="https://c4.staticflickr.com/8/7032/6536097779_a0e9213ae9.jpg" alt="" />
                </figure>
                <div class="post-detail">
                <h3>
                     <a href="#">
                       I am afraid I can't do that, Dave
                    </a>
                </h3>
              <p><em>by</em> HAL</p>
                  </div>
            </div>
           </article>
        </div>

         <div class="wrap row">
          <article class="col-3">
             <div class="post-wrap">
            <figure class="feature-image">
                  <img src="https://c3.staticflickr.com/8/7224/7384323418_6793f7fb25.jpg" alt="" />
                </figure>
                <div class="post-detail">
                <h3>
                     <a href="#">
                       A monkey coded a website
                    </a>
                </h3>
              <p><em>As told by</em> Monkey </p>
                  </div>
            </div>
           </article>
          <article class="col-3">
             <div class="post-wrap">
            <figure class="feature-image">
                  <img src="https://c6.staticflickr.com/8/7414/13947832357_3bc63f7a3c.jpg" alt="" />
                </figure>
                <div class="post-detail">
                <h3>
                     <a href="#">
                       Cats are plotting for mutiny
                    </a>

                </h3>
                    <p><em>Seriously,</em> they are.</p>
               </div>
            </div>
           </article>
          <article class="col-3">
             <div class="post-wrap">
            <figure class="feature-image">
                  <img src="https://c3.staticflickr.com/8/7224/7384323418_6793f7fb25.jpg" alt="" />
                </figure>
                <div class="post-detail">
                <h3>
                <a href="#">This dog can dance, dude!</a>
                </h3>
                  <p>I am serious</p>
                  </div>
            </div>
           </article>
           <article class="col-3">
             <div class="post-wrap">
            <figure class="feature-image">
                  <img src="https://c6.staticflickr.com/8/7414/13947832357_3bc63f7a3c.jpg" alt="" />
                </figure>
                <div class="post-detail">
                <h3>
                     <a href="#">
                       All the light we cannot see
                    </a>
                </h3>
              <p><em>by</em> Anthony Doerr</p>
                  </div>
            </div>
           </article>
        </div>
      </section>
      <footer class="page-footer">
        <p><strong>About</strong> This pen is just an example of text gradients, CSS Sticky position and a flex-box based grid system. A pen by <a href="http://roshn.me" target="_blank">Roshan Ravi</a></p>
      </footer>
    @push('script')
        <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    @endpush
</x-app-layout>
