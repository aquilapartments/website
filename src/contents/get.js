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
            if(cut !== -1){
                let property = content.substr(0,cut)
                let value = content.replace(property + ': ','')
                if(property.trim() !== 'https' && property.trim() !== 'http'){
                    if(property !== '' && value !== ''){
                        if(value !== '>-'){
                            files[folder][slug][property] = value
                        }else{
                            files[folder][slug][property] = ''
                        }
                    }
                }else{
                    property = ''
                    for(let k in files[folder][slug]){
                        property = k
                    }
                    files[folder][slug][property] += content.trim()
                }
            }else if(content !== '---'){
                let property
                for(let k in files[folder][slug]){
                    property = k
                }
                files[folder][slug][property] += content.trim()
            }
        }
    });
}

importAll(require.context('./translations', true, /\.md$/), 'translations');
importAll(require.context('./homeslider', true, /\.md$/), 'homeslider');
importAll(require.context('./accomodation', true, /\.md$/), 'accomodation');
importAll(require.context('./homebox', true, /\.md$/), 'homebox');
importAll(require.context('./extraservice', true, /\.md$/), 'extraservice');
importAll(require.context('./accomodationslider', true, /\.md$/), 'accomodationslider');

module.exports = {
    translations: files['translations'],
    homeslider: files['homeslider'],
    accomodation: files['accomodation'],
    homebox: files['homebox'],
    extraservice: files['extraservice'],
    accomodationslider: files['accomodationslider']
} 