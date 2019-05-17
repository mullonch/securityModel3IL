package cc.flavien.cryptolocker

import java.security.KeyPair
import java.security.KeyPairGenerator
import java.security.PrivateKey
import java.security.PublicKey
import javax.crypto.Cipher

class CryptMessage(
        var publicKey: PublicKey?,
        var privateKey: PrivateKey?
) {
    constructor(): this(null, null) {
        val kp: KeyPair
        val kpg: KeyPairGenerator = KeyPairGenerator.getInstance(CRYPTO_METHOD)
        kpg.initialize(CRYPTO_BITS)
        kp = kpg.genKeyPair()

        publicKey = kp.public
        privateKey = kp.private
    }

    fun encrypt(input: ByteArray): ByteArray {
        val cipher = Cipher.getInstance("RSA")
        cipher.init(Cipher.ENCRYPT_MODE, privateKey)

        return cipher.doFinal(input)
    }

    fun decrypt(input: ByteArray): ByteArray {
        val cipher = Cipher.getInstance("RSA")
        cipher.init(Cipher.DECRYPT_MODE, publicKey)

        return cipher.doFinal(input)
    }

    companion object {
        const val CRYPTO_METHOD = "RSA"
        const val CRYPTO_BITS = 4096
    }
}