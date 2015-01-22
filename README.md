# ga-custom-dimension
### 概要
GAのカスタムディメンジョンタグを設置するためのプラグインです。

### 使い方
WP Total HacksのGoogle Analytics管理機能から以下のショートコードを設置してください
```
[ga_custom_demention_author]
[ga_custom_demention_published]
[ga_custom_demention_category]
[ga_custom_demention_media]
```

### 投稿者情報
`[ga_custom_demention_author]`を設置すると、`ga('set', 'dimension1', '<投稿者名>');`に展開されます

### 公開日
`[ga_custom_demention_published]`を設置すると、`ga('set', 'dimension1', '<公開日>');`に展開されます

### カテゴリ
`[ga_custom_demention_category]`を設置すると、`ga('set', 'dimension1', '<カテゴリ名>');`に展開されます

### メディア
`[ga_custom_demention_media]`を設置すると、`ga('set', 'dimension1', '<メディア名>');`に展開されます。ここで言うメディア名とはカスタムタクソノミーmediaで設定されているタームの情報です。
