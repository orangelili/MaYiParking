pipeline {
    agent { docker 'php' }
    stages {
        stage('build') {
            steps {
                sh 'echo "test echo"'
                sh 'ls -lah'
            }
        }
    }
}
