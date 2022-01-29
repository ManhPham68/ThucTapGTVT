<style >
    $color__black: #121111;
    $color__white: #fcffff;

    $color__gray--lighter: #efeeee;
    $color__gray--light: #dcdddd;
    $color__gray: #c3c4c4;
    $color__gray--dark: #969999;
    $color__gray--darker: #323333;
    $color__gray--darkest: #121111;

    $color__red--lightest: #f8979c;
    $color__red--lighter: #FF888D;
    $color__red--light: #F14950;
    $color__red: #FF190D;
    $color__red--dark: #c51104;
    $color__red--darker: #A00309;
    $color__red--darkest: #800007;

    $color__rose--lightest: #FFA1D9;
    $color__rose--lighter: #FF8AD0;
    $color__rose--light: #FF66C1;
    $color__rose: #FF1AA2;
    $color__rose--dark: #B2096E;
    $color__rose--darker: #9F005F;
    $color__rose--darkest: #520031;

    $color__orange--lightest: #ffcf9a;
    $color__orange--lighter: #feac68;
    $color__orange--light: #fc9a46;
    $color__orange: #fa6824;
    $color__orange--dark: #bb4a19;
    $color__orange--darker: #992807;
    $color__orange--darkest: #770505;

    $color__yellow--lightest: #fffecf;
    $color__yellow--lighter: #fffd8e;
    $color__yellow--light: #fffc5c;
    $color__yellow: #ffeb3b;
    $color__yellow--dark: #d1ba01;
    $color__yellow--darker: #c0a900;
    $color__yellow--darkest: #906000;

    $color__green--lightest: #6cfd6f;
    $color__green--lighter: #39fa3f;
    $color__green--light: #17E81F;
    $color__green: #009B06;
    $color__green--dark: #037907;
    $color__green--darker: #025a05;
    $color__green--darkest: #023b04;

    $color__blue--lightest: #afedff;
    $color__blue--lighter: #6edbff;
    $color__blue--light: #3ca9ff;
    $color__blue: #2196f3;
    $color__blue--dark: #0b62a6;
    $color__blue--darker: #044475;
    $color__blue--darkest: #142633;

    $color__violet: #B406FF;
    $color__violet--dark: #7D02B2;
    $color__violet--darker: #470165;
    $color__violet--darkest: #130032;

    $stroke__width: 0.5;

    $app__size: 400px;
    $head__height: ($app__size * 0.70) * (56/85);
    $body__height: ($app__size * 0.70) * (44.5/70);

    body {
        background-color: $color__gray;
        overflow: hidden;
    }

    svg {
        height: $app__size * 1.5;
        position: absolute;
        width: $app__size;
    }

    path {
        fill: transparent;
        stroke: rgba($color__blue, 0.2);
        stroke-width: $stroke__width;
    }

    .wrapper {
        align-items: center;
        color: $color__gray--darker;
        display: flex;
        font-family: monospace;
        font-size: 16px;
        height: $app__size * 1.5;
        justify-content: center;
        position: absolute;
        top: 50%; left: 50%;
        transform: translateX(-50%) translateY(-50%);
        width: $app__size;

    h1, p {
        position: absolute;
        z-index: 999;
    }

    h1 {
        font-size: 2em;
        top: 70%;
    }

    p {
        font-weight: 600;
        top: calc(70% + 2.5em);
    }
    }

    .grid-lines {
        height: 100%;
        position: absolute;
        top: 0; left: 50%;
        transform: translateX(-50%);
        width: 100%;
    }
    .grid-lines__line {
        stroke-width: $stroke__width / 3;
    }
    .grid-lines__line--cir {
        stroke: rgba($color__black, 0.25);
    }
    .grid-lines__line--diag {
        stroke: rgba($color__black, 0.15);
    }
    .grid-lines__line--hor {
        stroke: rgba($color__black, 0.15);
    }
    .grid-lines__line--ver {
        stroke: rgba($color__black, 0.2);
    }

    .wiz {
        fill: transparent;
        stroke: rgba($color__red, 0.5);
    }

    .wiz--beard,
    .wiz--eye,
    .wiz--eye-brow,
    .wiz--hair,
    .wiz--hair-bg,
    .wiz--head,
    .wiz--mouth,
    .wiz--mustache,
    .wiz--staff,
    .wiz--sword {
        stroke: transparent;
    }

    .wiz--beard {
        fill: $color__gray--lighter;
        stroke: rgba($color__gray--dark, 0.5);
    }

    .wiz--eye {
        fill: $color__blue--dark;
        stroke: $color__blue--darker;
    }

    .wiz--eye-brow {
        fill: $color__gray--light;
        stroke: rgba($color__gray--darker, 0.5);
    }

    .wiz--hair {
        fill: $color__gray--lighter;
        stroke: rgba($color__gray--dark, 0.5);
    }

    .wiz--hair-bg {
        fill: $color__gray--darker;
    }

    .wiz--head {
        fill: $color__orange--lightest;
    }

    .wiz--mouth {
        fill: $color__black;
    }

    .wiz--mustache {
        fill: $color__gray--light;
        stroke: rgba($color__gray--darker, 0.5);
    }

    .wiz--staff {
        fill: $color__gray--darker;
        transform: rotate(-45deg) translateX(30%) translateY(-10%);
        transform-origin: 50% 50%;
    }

    .wiz--sword {
        fill: $color__gray--dark;
        transform: rotate(45deg) translateX(-35%) translateY(-5%);
        transform-origin: 50% 50%;
    }
</style>
<div class="wrapper">

<h1>403 Forbidden</h1>

<p>You shall not pass!</p>

<svg class="grid-lines"
     viewbox="0 0 100 150"
     preserveAspectRatio="xMidYMid slice"
     height="150" width="100">

    <path class="grid-lines__line grid-lines__line--hor" d="m0,39 l100,0" />
    <path class="grid-lines__line grid-lines__line--hor" d="m0,75 l100,0" />
    <path class="grid-lines__line grid-lines__line--hor" d="m0,111 l100,0" />
    <path class="grid-lines__line grid-lines__line--ver" d="m14,0 l0,150" />
    <path class="grid-lines__line grid-lines__line--ver" d="m32,0 l0,150" />
    <path class="grid-lines__line grid-lines__line--ver" d="m50,0 l0,150" />
    <path class="grid-lines__line grid-lines__line--ver" d="m68,0 l0,150" />
    <path class="grid-lines__line grid-lines__line--ver" d="m86,0 l0,150" />
    <path class="grid-lines__line grid-lines__line--diag" d="m14,0 l72,150" />
    <path class="grid-lines__line grid-lines__line--diag" d="m0,25 l100,100" />
    <path class="grid-lines__line grid-lines__line--diag" d="m100,25 l-100,100" />
    <path class="grid-lines__line grid-lines__line--diag" d="m86,0 l-72,150" />
    <path class="grid-lines__line grid-lines__line--cir"
          d="m50,57 c18,0 18,18 18,18
      c0,18 -18,18 -18,18
      c-18,0 -18,-18 -18,-18
      c0,-18 18,-18 18,-18" />
    <path class="grid-lines__line grid-lines__line--cir"
          d="m50,39 c36,0 36,36 36,36
      c0,36 -36,36 -36,36
      c-36,0 -36,-36 -36,-36
      c0,-36 36,-36 36,-36" />
    <path class="grid-lines__line grid-lines__line--cir"
          d="m50,21 c54,0 54,54 54,54
      c0,54 -54,54 -54,54
      c-54,0 -54,-54 -54,-54
      c0,-54 54,-54 54,-54" />


    <path class="wiz wiz--hair-bg"
          d="m50,48
      c0,0 6,0 6,2
      c0,0 0,3 2,3
      c0,0 2,0 2,4
      c0,0 2,0 2,4
      c0,0 3,0 3,6
      c0,0 2,4 -2,6
      c0,0 -2,4 -2,6
      c0,0 0,6 -3,6
      c0,0 0,0 -8,0
      c0,0 0,0, -8,0
      c0,0 -3,0 -3,-6
      c0,0 -2,-4 -2,-6
      c0,0 -4,-2 -2,-6
      c0,0 0,-6 3,-6
      c0,0 0,-4 2,-4
      c0,0 0,-4 2,-4
      c0,0 2,0 2,-3
      c0,0 6,0 6,-2" />

    <path class="wiz wiz--head"
          d="m50,50
      c0,0 8,0 8,10
      c0,0 0,10 -8,10
      c0,0 -8,0 -8,-10
      c0,0 0,-10 8,-10" />

    <path class="wiz wiz--hair"
          d="m50,48
      c0,0 6,0 6,2
      c0,0 0,3 2,3
      c0,0 2,0 2,4
      c0,0 2,0 2,4
      c0,0 3,0 3,6
      c0,0 2,4 -2,6
      c0,0 -2,4 -2,6
      c0,0 0,6 -3,6
      c0,0 0,0 -8,0
      c0,0 6,0 6,-2
      c0,0 4,0 2,-4
      c0,0 4,0 2,-4
      c0,0 -2,-2 2,-6
      c0,0 2,-4 -2,-6
      c0,0 -4,0 -4,-4
      c0,0 0,-4 -2,-4
      c0,0 0,-6 -4,-3" />


    <path class="wiz wiz--hair"
          d="m50,52
      c0,0 -6,-4 -6,4
      c0,0 0,4 -2,4
      c0,0 0,4 -2,4
      c0,0 -2,0 0,4
      c0,0 0,2 0,4
      c0,0 2,2 0,4
      c0,0 -2,4 4,3
      c0,0 -2,4 2,4
      c0,0 0,2 4,2
      c0,0 0,0, -8,0
      c0,0 -3,0 -3,-6
      c0,0 -2,-4 -2,-6
      c0,0 -4,-2 -2,-6
      c0,0 0,-6 3,-6
      c0,0 0,-4 2,-4
      c0,0 0,-4 2,-4
      c0,0 -1,0 0,-4
      c0,0 2,1 8,-1" />

    <path class="wiz wiz--beard"
          d="m50,69
      c0,0 5,0 5,-1
      c0,0 4,0 4,2
      c0,0 2,0 1,4
      c0,0 2,0 1,6
      c0,0 2,0 1,6
      c0,0 -2,4 -2,4
      c0,0 -2,4 0,6
      c0,0 -4,0 -4,-4
      c0,0 0,4 -2,4
      c0,0 0,2 -2,2
      c0,0 -4,0 -4,4
      c0,0 -4,0 -2,-6
      c0,0 -2,4 -6,4
      c0,0 4,-2 2,-6
      c0,0 -4,0 -4,-4
      c0,0 -4,0 -4,-4
      c0,0 4,4 4,-4
      c0,0 0,-6 2,-6
      c0,0 0,-4 2,-4
      c0,0 0,-4 2,-4
      c0,0 0,1 6,1" />

    <path class="wiz wiz--mouth"
          d="m50,65
      c0,0 5,0 5,3
      c0,0 0,2 -5,2
      c0,0 -5,0 -5,-2
      c0,0 0,-4 5,-3" />

    <path class="wiz wiz--mustache"
          d="m50,64
      c0,0 4,0 4,1
      c0,0 2,0 2,2
      c0,0 2,0 1,3
      c0,0 2,0 0,3
      c0,0 0,0 0,0
      c0,0 0,-2 -2,-2
      c0,0 1,-3 -1,-3
      c0,0 0,-1 -4,-2
      c0,0 -4,-2 -4,2
      c0,0 -1,0 -1,2
      c0,0 -2,0 -1,3
      c0,0 -4,-2 -1,-4
      c0,0 -2,-3 1,-3
      c0,0 -1,-5 6,-2" />

    <path class="wiz wiz--eye wiz--left"
          d="m45,60
       c0,0 2,0 2,1
       c0,0 0,1 -2,0
       c0,0 -1,0 0,-1" />

    <path class="wiz wiz--eye wiz--right"
          d="m52,60
       c0,0 1,-1 2,0
       c0,0 0,1 -2,1
       c0,0 -1,0 0,-1" />

    <path class="wiz wiz--eye-brow wiz--left"
          d="m42,61
       c0,0 0,-3 1,-3
       c0,0 3,0 4,2
       c0,0 -1,-1 -4,-1
       c0,0 -1,0 -1,2" />

    <path class="wiz wiz--eye-brow wiz--right"
          d="m51,60
       c0,0 2,-3 4,-3
       c0,0 2,0 2,3
       c0,0 -1,-2 -2,-2
       c0,0 -2,0 -4,2" />

    <path class="wiz wiz--sword"
          d="m50,30
       c0,0 2,2 2,6
       l0,50
       l6,0
       c0,0 2,0 2,-2
       l1,0
       c0,0 0,4 -4,4
       l-6,0
       l0,14
       c0,0 2,0 2,2
       c0,0 0,2 -4,2
       c0,0 -3,0 -4,-2
       c0,0 0,-2 2,-2
       l0,-14
       l-6,0
       c0,0 -4,0 -4,-4
       l1,0
       c0,0 0,2 2,2
       l6,0
       l0,-50
       c0,0 0,-3 2,-6
       z" />

    <path class="wiz wiz--staff"
          d="m46,30
       l2,0
       c0,0 1,0 1,1
       l0,2
       c0,0 2,0 2,-2
       l1,0
       c0,0 1,0 1,2
       c0,0 2,0 2,-2
       l2,0
       c0,0 0,4 -2,4
       c0,0 0,4 -2,4
       c0,0 0,2 -1,2
       l0,40
       c0,0 0,4 -1,4
       l0,40
       c0,0 0,4 -1,4
       c0,0 -1,0 -1,-4
       c0,0 -2,0 -2,-4
       l0,-60
       c0,0 -1,0 -1,-4
       l0,-20
       c0,0 -1,0 -1,-4
       c0,0 0,-3 1,-3" />


</svg>

</div>
