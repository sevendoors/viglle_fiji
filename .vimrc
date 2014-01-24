if(has("win32") || has("win95") || has("win64") || has("win16")) "判定当前操作系统类型
    let g:iswindows=1
else
    let g:iswindows=0
endif
set nocompatible "不要vim模仿vi模式，建议设置，否则会有很多不兼容的问题
syntax on "打开高亮
if has("autocmd")
    filetype plugin indent on "根据文件进行缩进
    augroup vimrcEx
        au!
        autocmd FileType text setlocal textwidth=78
        autocmd BufReadPost *
                    \ if line("'\"") > 1 && line("'\"") <= line("$") |
                    \ exe "normal! g`\"" |
                    \ endif
    augroup END
else
    "智能缩进，相应的有cindent，官方说autoindent可以支持各种文件的缩进，但是效果会比只支持C/C++的cindent效果会差一点，但笔者并没有看出来
    set autoindent " always set autoindenting on 
endif " has("autocmd")
set tabstop=4 "让一个tab等于4个空格
set vb t_vb=
set wrap "不自动换行
set hlsearch "高亮显示结果
set incsearch "在输入要搜索的文字时，vim会实时匹配
set backspace=indent,eol,start whichwrap+=<,>,[,] "允许退格键的使用
"if(g:iswindows==1) "允许鼠标的使用
"    "防止linux终端下无法拷贝
"    if has('mouse')
"        set mouse=a
"    endif
"    au GUIEnter * simalt ~x
"endif
"字体的设置
"set guifont="微软雅黑":h9:cANSI "记住空格用下划线代替哦
set nu
set go="无菜单"
"按F2取消高亮
nmap <F2> :nohlsearch<CR>

"========================================vimrc相关设置===================
function! MySys()
  if has("win32")
    return "windows"
  else
    return "linux"
  endif
endfunction

function! SwitchToBuf(filename)
    "let fullfn = substitute(a:filename, "^\\~/", $HOME . "/", "")
    " find in current tab
    let bufwinnr = bufwinnr(a:filename)
    if bufwinnr != -1
        exec bufwinnr . "wincmd w"
        return
    else
        " find in each tab
        tabfirst
        let tab = 1
        while tab <= tabpagenr("$")
            let bufwinnr = bufwinnr(a:filename)
            if bufwinnr != -1
                exec "normal " . tab . "gt"
                exec bufwinnr . "wincmd w"
                return
            endif
        tabnext
            let tab = tab + 1
        endwhile
        " not exist, new tab
        exec "tabnew " . a:filename
    endif
endfunction

"Fast edit vimrc
let mapleader = ","
if MySys() == 'linux'
    "Fast reloading of the .vimrc
    map <silent> <leader>ss :source ~/.vimrc<cr>
    "Fast editing of .vimrc
    map <silent> <leader>ee :call SwitchToBuf("~/.vimrc")<cr>
    "When .vimrc is edited, reload it
    autocmd! bufwritepost .vimrc source ~/.vimrc
elseif MySys() == 'windows'
    " Set helplang
    set helplang=cn
    "Fast reloading of the _vimrc
    map <silent> <leader>ss :source $vim/_vimrc<cr>
    "Fast editing of _vimrc
    map <silent> <leader>ee :call SwitchToBuf("$vim/_vimrc")<cr>
    "When _vimrc is edited, reload it
    autocmd! bufwritepost _vimrc source $vim/_vimrc
endif

" For windows version
if MySys() == 'windows'
    source $VIMRUNTIME/mswin.vim
    behave mswin
endif 
autocmd! bufwritepost _vimrc source $vim/_vimrc



"Default encoding
set encoding=utf-8
set fileencodings=utf-8,big5,gbk,latin1
set fileencoding=utf-8
set ambiwidth=double
"Hot key to switch between Big5 and UTF-8
"set <C-u>=^U
"set <C-b>=^B
"map <C-u> :set fileencoding=utf-8<CR>
"map <C-u> :set fileencoding=gbk<CR>
""""""""""""""""""""""""""""""
" netrw setting
""""""""""""""""""""""""""""""
"打开当前文件所在目录
let g:netrw_winsize = 30
nmap <silent> <leader>fe :Sexplore!<cr>



"cd C:\Users\Loki\Desktop 

"文件类型
filetype plugin indent on

"显示方案
" color scheme 
"if has("gui_running")
"  colorscheme lucius
"else
"  colorscheme desert_my
"endif " has 

set ruler
set autochdir
set cursorline
"set nowrapscan
set smartindent
set cmdheight=1
set laststatus=2
set statusline=\ %<%F[%1*%M%*%n%R%H]%=\ %y\ %0(%{&fileformat}\ %{&encoding}\ %c:%l/%L%)\ 

set t_Co=256
"set cc=78



"custom
set mouse=a
set so=7
set magic
set autowrite

let g:user_emmet_install_global = 0
autocmd FileType html,css EmmetInstall

"""""""""""""""""""""""""""""""""""""""""""""""""""""
"""*******************移动命令*********************""
"""""""""""""""""""""""""""""""""""""""""""""""""""""
"1.h,j,k,l上下左右
"f$,F$,t$,T$以寻找字符$跳转
"w下一个词词首,b上一个词词首,e下一个词词尾,ge上一个词词尾
"W下一个字符串字符串首,B上一个字符串字符串首,E下一个字符串字符串尾,gE上一个字符串字符串尾
"H/M/L光标跳转到窗口的顶部,中部和底部
"zt,zz,zb 本行移至顶端,中端,底端
"0行首,$行尾,^行首第一个非空白字符
"<C-d>向下移动半屏<C-u>向上移动半屏down,up
"<C-f>向下移动一屏<C-b>向上移动一屏forward,back
"g,G,%以行跳转

"   '    或者    `   跳转到最后位置 ` 记录列  '不记录列岛行首
"	C-o		上一次的位置	C-i		更新的位置
"	:jumps	查看跳转表


"标记跳转
"m{a-zA-Z}标记
"  '  或者   `   {a-zA-Z}跳转至标记
"另外还有一种ma不是很了解
"可以参考:help m

"""""""""""""""""""""""""""""""""""""""""""""""""""""
"""*******************替换命令*********************""
"""""""""""""""""""""""""""""""""""""""""""""""""""""
":[range]s/pattern/string/[c,e,g,i]
"range-范围(%-正在编辑的:#-上一次编辑的;1,7一到七行;1,$一到最后一行)
"c确认
"e不显示error
"g,globe,正行替换
"i,ignore,不分大小写
"有正则表达类似规则,以后再加

"""""""""""""""""""""""""""""""""""""""""""""""""""""
"""*******************多文件命令*********************""
"""""""""""""""""""""""""""""""""""""""""""""""""""""
"buffer,window,tab
"buffer不显示,保存文件信息
"window分割窗口
"tab	额,不知道怎么说了

""""""buffer
"	:ls	列出打开的buffer,数字键跳转
"	,fe	打开netrew查看文件目录,打开文件一般会采取的方式
"	:e	有可能的方式
"	C-^	相邻buffer之间跳转
"	:next,:previous,:last,:first跳转
"	:args 编辑另一个文件列表
""""""window
"	:split	或者	:new	或者	:vsplit	或者	:vnew	打开新窗口
"	C-W H,J,K,L调整窗口位置
""""""tab
"tabe	*** 新建tab
"tabn[ext] or <C-PageDown> or gt 跳转下一个标签页
"tabp[revious]	or	:tabN[ext] or <C-PageUp> or gT 跳转到上一个标签页
":tabs 列出标签页和它们所含的窗口
":tabm[ove] [N] 设置此tab到第N个


"""""""""""""""""""""""""""""""""""""""""""""""""""""
"""*******************对比命令*********************""
"""""""""""""""""""""""""""""""""""""""""""""""""""""
"	:vertical diffsplit *** 还不是很熟悉,具体参考 :help usr_08



"""""""""""""""""""""""""""""""""""""""""""""""""""""
"""*******************统计命令*********************""
"""""""""""""""""""""""""""""""""""""""""""""""""""""
"选择文本
"按下g<C-g>

"""""""""""""""""""""""""""""""""""""""""""""""""""""
"""*******************自定义命令*********************""
"""""""""""""""""""""""""""""""""""""""""""""""""""""
"F2消除高亮
",fe 打开资源管理器

