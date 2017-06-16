pipeline {
    agent { docker 'php' }
    stages {
        stage('build') {
            steps {
                sh 'php --version',
                sh 'echo "test echo"'
            }
        }
    }
}
