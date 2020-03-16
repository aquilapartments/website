const git = require('simple-git')('../');
const path = require('path')
const script = path.join(__dirname, 'build.sh');

function watch(){
    git.exec(() => console.log('starting pull...'))
    .pull((err, update) => {
    if(update && update.summary.changes) {
            console.log('updating vue build...')
            require('child_process').exec(script, function(error, stdout, stderr){ if(error){console.log(error)} });
            console.log('vue built.')
            setTimeout(function(){
                watch()
            }, 30000)
    }
    })
    .exec(() => {
        console.log('pull done.')
        setTimeout(function(){
            watch()
        }, 30000)
    })
}

watch()