var files = {};

function importAll (r, folder) {
    files[folder] = {}
    r.keys().forEach(key => {
        let slug = key.replace('.md','').substr(2,key.length)
        let contents = r(key).default.split("\n")
        files[folder][slug] = {}
        let max = contents.length - 1
        for(let i = 1; i < max; i++){
            let content = contents[i]
            let cut = content.indexOf(':')
            let property = content.substr(0,cut)
            let value = content.replace(property + ': ','')
            if(property !== '' && value !== ''){
                files[folder][slug][property] = value
            }
        }
    });
}

importAll(require.context('./translations', true, /\.md$/), 'translations');
module.exports = {
    translations: files['translations']
} 