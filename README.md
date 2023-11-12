# Warsic音乐社团
Warsic音乐社团官网  
The official website of the Warsic Music Club  

## Markdown页面渲染
将Markdown文件路径作为`page`参数传递给**index.html**以实现Markdown页面渲染。  
示例如下：  
```html
<a href="/index.html?page=index.md">查看主页</a>
```
```markdown
[查看README](/index.html?page=README.md)
```
Markdown样式参考：[test.md](test.md)  
Markdown样式展示（链接仅渲染后有效）：[/index.html?page=test.md](/index.html?page=test.md)  

## Markdown技术支持
- [MarkdownIt](https://github.com/markdown-it/markdown-it)
- [typora-purple-theme](https://github.com/hliu202/typora-purple-theme)
